<?php

namespace Devatmaliance\Repository\Service;

interface ServiceReceiverMapperDTOInterface
{
    public function mapDtos(): array;
    public function getMapDto(string $entity): array;
}