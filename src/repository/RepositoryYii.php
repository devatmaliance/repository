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


        if (!$classEntity = $this->repositoryEntity->entities()[$entity]) {
            return $classEntity;
        }
        $models = [];

        foreach ($this->actionDTO->getFields() as $fields) {
            $fields = $this->convertToArray($fields);

            if ($this->isExistsModel($fields)) {
                continue;
            }

            $model = new $classEntity($fields);
            
            $model->setScenario(self::SCENARIO);
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
            $fields = $this->convertToArray($fields);
            $model = $this->getModel($fields);
            
            if (!$model) continue;

            $model->setScenario(self::SCENARIO);
            $model->setAttributes($fields);
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
            $fields = $this->convertToArray($fields);
            $model = $this->getModel($fields);

            if (!$model) continue;

            $model->setScenario(self::SCENARIO);
            $this->deleteModel($model);
            $models[] = $fields;
        }
        return $this->actionDTO->getFields();
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
            throw new \InvalidArgumentException('Один за параметров отсутствует в переданных полях');
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

    /**
     * @throws Exception
     */
    private function getModel(array $fields)
    {
        $this->assertSearchParamNotEmpty($fields);
        
        $classEntity = $this->getClassEntity();
        $searchParam = $this->getSearchParams();

        if (!$classEntity) {
            return null;
        }

        if (!$model = $classEntity->findOne([$searchParam => $fields[$searchParam]])) {
            return null; 
        }

        return $model;
    }

    private function isExistsModel(array $fields): bool
    {
        $classEntity = $this->getClassEntity();

        if (!$this->isSearchParamsExists($fields)) {
            return false;
        }

        $searchParam = $this->getSearchParams();

        if (!$classEntity) {
            return false;
        }

        return $classEntity->find()->where([$searchParam => $fields[$searchParam]])->exists();
    }

    private function getSearchParams(): array
    {
        return $this->actionDTO->getSearchParams();
    }

    private function getClassEntity()
    {
        $entity = $this->actionDTO->getEntity();

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