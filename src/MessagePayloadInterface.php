<?php

namespace Devatmaliance\Repository;

interface MessagePayloadInterface
{
    public function getMessageId(): string;
    public function getMessageDate(): string;
    public function getPayload(): string;
    public function setMessageId(string $id): void;
    public function setMessageDate(string $date): void;
    public function setPayload(string $payload): void;
}
