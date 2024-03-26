<?php

namespace Devatmaliance\Repository\service;

interface ServiceReceiverMapperDTOInterface
{
    public function mapDtos(): array;
    public function getFieldsMapDto(string $entity): array;
    public function getSearchParamsMapDto(string $entity, array $searchParams): array;

}