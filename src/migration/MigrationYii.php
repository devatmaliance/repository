<?php

namespace Devatmaliance\Repository\migration;

use Devatmaliance\Repository\migration\MigrationInterface;

class MigrationYii implements MigrationInterface
{
    /**
     * @throws \Exception
     */
    public function create(): void
    {
        $migrationName = "create_sql_dump_table";
        $command = "php yii migrate/create $migrationName --interactive=0";
        exec($command, $output);

        if (!in_array('New migration created successfully.', $output)) {
            throw new \Exception("Failed to create migration. " . implode("\n", $output));
        }

        $fileMigration = $this->findFileMigration($migrationName);
        chmod($fileMigration, 0644);

        $code = $this->generateCode($fileMigration);
        $this->saveInMigrationFile($fileMigration, $code);
    }

    private function findFileMigration(string $migrationName): string
    {
        $dir = \Yii::getAlias('@console/migrations');
        $migrations = glob($dir . "/*$migrationName*");

        if (!$migrations) {
            throw new \Exception("$migrationName не найден");
        }

        return $migrations[0];
    }

    private function generateCode(string $fileMigration): string
    {
        $functions = <<<'EOF'
{
    public function saveUp()
    {
        $sqlFiles = ["@console/runtime/create_structure.sql", "@console/runtime/insert_data.sql"];
        foreach ($sqlFiles as $sqlFile) {
            $sql = file_get_contents(Yii::getAlias($sqlFile));
            $this->execute($sql);
        }
    }

    public function safeDown()
    {
        return true;
    }
}
EOF;

        $migrationCode = file_get_contents($fileMigration);
        preg_match("/class(.*)/", $migrationCode, $matches);
        $class = $matches[0];
        return '<?php' . PHP_EOL . PHP_EOL . 'use yii\db\Migration;' . PHP_EOL . $class . PHP_EOL . $functions;
    }

    private function saveInMigrationFile(string $fileMigration, string $code): void
    {
        $handle = fopen($fileMigration, 'w');
        fwrite($handle, $code);
        fclose($handle);
    }
}