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
        $action = $actionDTO->getOperaton();
        $this->$action($actionDTO->getParams());
    }

    public function getParams(): array
    {
      return $this->params;
    }
    
    public function getMethod(): string
    {
        return $this->method;        
    }

    public function create(array $params): void
    {
        $this->params = $params;
        $this->method = 'get';
    }

    public function update(array $params): void
    {
        $this->params = $params;
        $this->method = 'post';
    }

    public function delete(array $params): void
    {
        $this->params = $params;
        $this->method = 'delete';
    }
}