<?php

namespace Devatmaliance\Repository\Service;

use Devatmaliance\Repository\Action\ActionDTOInterface;
use Devatmaliance\Repository\Repository\RepositoryEntityInterface;
use Devatmaliance\Repository\Repository\RepositoryInterface;
use Devatmaliance\Repository\Service\RepositoryServiceInterface;
use Devatmaliance\Repository\Service\ServiceReceiverMapperDTOInterface;

class RepositoryServiceYii implements RepositoryServiceInterface
{
    private ActionDTOInterface $actionDTO;
    private RepositoryInterface $repository;
    private RepositoryEntityInterface $repositoryEntity;
    private ?ServiceReceiverMapperDTOInterface $mapperDTO;
    private \stdClass $body;

    public function __construct(
        string $body,
        RepositoryInterface  $repository,
        ActionDTOInterface $actionDTO,
        RepositoryEntityInterface $repositoryEntity,
        ?ServiceReceiverMapperDTOInterface $mapperDTO = null
    )
    {
        $this->body = json_decode($body, false);
        $this->mapperDTO = $mapperDTO;
        $this->repositoryEntity = $repositoryEntity;
        $this->repository = $repository;
        $this->actionDTO = $actionDTO;
    }

    /**
     * @throws \Exception
     */
    public function execute(): array
    {
        $this->actionDTO->initDTO($this->body, $this->mapperDTO);
        $method = $this->actionDTO->getOperation();
        $this->repository->init($this->actionDTO, $this->repositoryEntity);
        return $this->repository->$method();
    }
}