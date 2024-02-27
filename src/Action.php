<?php
namespace Devatmaliance\Repository;

use ActionInterface;

class Action implements ActionInterface
{

    private string $entity;
    private array $params = [];
    private string $method = 'get';
    public function __construct(string $entity)
    {
        $this->entity = $entity;
    }

    public function create(array $fields): void
    {
        $fields = array_filter($fields, fn($field) => $field !== null);
        $this->params = ['operation' => \Devatmaliance\Repository\Action::CREATE, 'entity' => $this->entity, 'fields' => [$fields]];
        $this->method = 'get';
    }

    public function update(int $id, array $fields): void
    {
        $this->params = ['operation' => \Devatmaliance\Repository\Action::UPDATE, 'entity' => $this->entity, 'fields' => [array_merge(['id' => $id],$fields)]];
        $this->method = 'post';
    }

    public function delete(int $id): void
    {
        $this->params = ['operation' => \Devatmaliance\Repository\Action::DELETE, 'entity' => $this->entity, 'fields' => [['id' => $id]]];
        $this->method = 'delete';
    }

    public function getParams(): array
    {
      return $this->params;
    }
    
    public function getMethod(): string
    {
        return $this->method;        
    }
}