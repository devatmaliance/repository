<?php
namespace Devatmaliance\Repository;

use Devatmaliance\Repository\ActionInterface;
use Devatmaliance\Repository\ActionDTOInterface;

class Action implements ActionInterface
{
    private array $params = [];
    private string $method = 'get';

    public function __construct(ActionDTOInterface $actionDTO)
    {
        $this->$action($fields);
        $this->setParams($actionDTO);
    }

    public function getParams(): array
    {
      return $this->params;
    }
    
    public function getMethod(): string
    {
        return $this->method;        
    }

    private function setParams(ActionDTOInterface $actionDTO): void
    {
        $this->params = $actionDTO->getParams();
    }

    private function create(array $fields): void
    {
        $this->method = 'get';
    }

    private function update(array $fields): void
    {
        $this->method = 'post';
    }

    private function delete(array $fields): void
    {
        $this->method = 'delete';
    }
}