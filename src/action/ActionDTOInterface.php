<?php

namespace Devatmaliance\Repository\action;

use Devatmaliance\Repository\service\ServiceReceiverMapperDTOInterface;

interface ActionDTOInterface
{
    public function getOperation(): string;
    public function getEntity(): string;
    public function getFields(): array;
    public function getSearchParams(): array;
    public function getParams(): array;
    public function setOperation(string $operation): void;
    public function setEntity(string $entity): void;
    public function setFields(array $fields): void;
    public function setSearchParams(array $params): void;
    public function initDTO(\stdClass $source, ?ServiceReceiverMapperDTOInterface $mapperDTO): void;
}
