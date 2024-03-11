<?php

namespace console\components\dump_parser;

class SqlFileHandler
{
    private string $filename;
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function write(string $content)
    {
        $file = fopen($this->filename, 'a') or die("Unable to open file!");
        fwrite($file, $content);
        fclose($file);
    }
}