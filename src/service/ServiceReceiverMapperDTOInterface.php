<?php

namespace Devatmaliance\Repository\service;

interface ServiceReceiverMapperDTOInterface
{
    public function mapDtos(): array;
    public function getMapDto(string $entity): array;
    public function getSearchParamsMapDto(string $entity, array $searchParams): array;

}