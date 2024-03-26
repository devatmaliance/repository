<?php

namespace Devatmaliance\Repository\repository;

use Devatmaliance\Repository\repository\RepositoryEntityInterface;
use Devatmaliance\Repository\action\ActionDTOInterface;
use Devatmaliance\Repository\repository\RepositoryInterface;
use Exception;

class RepositoryYii implements RepositoryInterface
{
    public const SCENARIO = 'master_model_changes';
    private ActionDTOInterface $actionDTO;
    private RepositoryEntityInterface $repositoryEntity;

    public function init(ActionDTOInterface $actionDTO, RepositoryEntityInterface $repositoryEntity): void
    {
        $this->actionDTO = $actionDTO;
        $this->repositoryEntity = $repositoryEntity;
    }

    /**
     * @throws Exception
     */
    public function create(): array
    {
        $entity = $this->actionDTO->getEntity();

        if (!$classEntity = $this->getClassEntity($entity)) {
            return $classEntity;
        }

        $models = [];

        foreach ($this->actionDTO->getFields() as $fields) {
            $attribites = $this->getTransformedAttributes($fields);

            if ($this->isExistsModel($attribites)) {
                continue;
            }

            $model = new $classEntity();
            $model->setScenario(self::SCENARIO);
            $model->setAttributes($attribites, false);
            $this->saveModel($model);
            $models[] = $model->getAttributes();
        }

        return $models;
    }

    /**
     * @throws ModelNotValidateException
     * @throws Exception
     */
    public function update(): array
    {
        $models = [];

        foreach ($this->actionDTO->getFields() as $fields) {
            $attribites = $this->getTransformedAttributes($fields);
            $model = $this->getModel($attribites);

            if (!$model) {
                return $this->create();
            }

            $model->setScenario(self::SCENARIO);
            $model->setAttributes($attribites, false);
            $this->saveModel($model);
            $models[] = $model->getAttributes();
        }

        return $models;
    }

    /**
     * @throws Exception
     */
    public function delete(): array
    {
        $models = [];

        foreach ($this->actionDTO->getFields() as $fields) {
            $attribites = $this->getTransformedAttributes($fields);
            $model = $this->getModel($attribites);

            if (!$model) continue;

            $model->setScenario(self::SCENARIO);
            $this->deleteModel($model);
            $models[] = $fields;
        }
        return $models;
    }

    /**
     * @throws Exception
     */
    private function saveModel($model): void
    {
        if (!$model->save(false)) {
            throw new Exception($model);
        }
    }

    private function getTransformedAttributes(array $fields): array
    {
        $fields = $this->convertToArray($fields);
        return $this->convertArrayFieldToId($fields);
    }

    /**
     * @throws Exception
     */
    private function deleteModel($model): void
    {
        if (!$model->delete()) {
            throw new Exception('Ошибка удаления модели: ' . $model::tableName() . ' по ID ' . $model->id);
        }
    }

    private function assertSearchParamNotEmpty(array $fields): void
    {
        if (!$this->isSearchParamsExists($fields)) {
            throw new \InvalidArgumentException('Один из searchParams отсутствует в переданных полях');
        }
    }

    private function isEntityExists(string $entity): bool
    {
        return isset($this->repositoryEntity->entities()[$entity]);
    }

    private function isSearchParamsExists(array $fields): bool
    {
        $searchParams = $this->getSearchParams();

        foreach ($searchParams as $param) {
            if (!isset($fields[$param])) {
                return false;
            }
        }

        return true;
    }

    private function convertArrayFieldToId(array $fields): array
    {
        foreach ($fields as $name => $value) {
            if (is_array($value)) {
                $uuid = $value['uuid'];
                $classEntity = $this->getClassEntity($value['entity']);
                $model = $classEntity->findOne(['uuid' => $value['uuid']]);

                if (!$model) {
                    throw new \Exception("Для поля $name по uuid $uuid модель не найдена");
                }

                $fields[$name] = $model->primaryKey;
            }
        }

        return $fields;
    }

    /**
     * @throws Exception
     */
    private function getModel(array $fields)
    {
        $this->assertSearchParamNotEmpty($fields);
        $entity = $this->actionDTO->getEntity();
        $classEntity = $this->getClassEntity($entity);
        $searchParams = $this->getSearchParams();

        if (!$classEntity) {
            return null;
        }

        $query = $this->getQuery($searchParams, $fields, $classEntity);

        if (!$model = $query->one()) {
            return null;
        }

        return $model;
    }

    private function getQuery(array $searchParams, array $fields, $classEntity)
    {
        if (count($searchParams) === 1) {
            $query = $classEntity::find()->andWhere([$searchParams[0] => $fields[$searchParams[0]]]);
        } else {
            $query = $classEntity::find();

            foreach ($searchParams as $param) {
                $query->andWhere([$param => $fields[$param]]);
            }
        }

        return $query;
    }

    private function isExistsModel(array $fields): bool
    {
        $entity = $this->actionDTO->getEntity();
        $classEntity = $this->getClassEntity($entity);

        if (!$this->isSearchParamsExists($fields)) {
            return false;
        }

        $searchParams = $this->getSearchParams();

        if (!$classEntity) {
            return false;
        }

        $query = $this->getQuery($searchParams, $fields, $classEntity);

        return $query->exists();
    }

    private function getSearchParams(): array
    {
        return $this->actionDTO->getSearchParams();
    }

    private function getClassEntity(string $entity)
    {
        if (!$this->isEntityExists($entity)) {
            return null;
        }

        return $this->repositoryEntity->entities()[$entity];
    }

    private function convertToArray($fields): array
    {
        return json_decode(json_encode($fields), true);
    }
}