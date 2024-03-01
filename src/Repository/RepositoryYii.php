<?php

namespace Devatmaliance\Repository\Repository;

use Devatmaliance\Repository\Repository\RepositoryEntityInterface;
use Devatmaliance\Repository\Action\ActionDTOInterface;
use Devatmaliance\Repository\Repository\RepositoryInterface;
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

        if (!$this->isEntityExists($entity)) {
            return [];
        }
        
        $classEntity = $this->repositoryEntity->entities()[$entity];
        $models = [];

        foreach ($this->actionDTO->getFields() as $fields) {
            $fields = $this->convertToArray($fields);

            if ($model = $this->getModel($fields)) {
                return $model->getAttributes();
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
            $this->assertSearchParamNotEmpty($fields);
            $model = $this->getModel($fields);
            
            if (!$model) return [];
            
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
        foreach ($this->actionDTO->getFields() as $fields) {
            $fields = $this->convertToArray($fields);
            $this->assertSearchParamNotEmpty($fields);
            $model = $this->getModel($fields);

            if (!$model) return [];

            $model->setScenario(self::SCENARIO);
            $this->deleteModel($model);
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
        $searchParam = $this->actionDTO->getSearchParam();

        if (!isset($fields[$searchParam])) {
            throw new \InvalidArgumentException('Отсутствует поле ' . $searchParam);
        }
    }

    private function isEntityExists(string $entity): bool
    {
        return isset($this->repositoryEntity->entities()[$entity]);
    }

    /**
     * @throws Exception
     */
    private function getModel(array $fields)
    {
        $entity = $this->actionDTO->getEntity();
        $searchParam = $this->actionDTO->getSearchParam();
        
        if (!$this->isEntityExists($entity)) {
            return null;
        }

        $classEntity = $this->repositoryEntity->entities()[$entity];

        if (!$model = $classEntity->findOne([$searchParam => $fields[$searchParam]])) {
            return null; 
        }

        return $model;
    }

    private function convertToArray($fields): array
    {
        return json_decode(json_encode($fields), true);
    }
}