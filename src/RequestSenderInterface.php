<?php

namespace Devatmaliance\Repository;

interface RequestSenderInterface
{
    public function get(array $params);
    public function post(array $params);
    public function delete(array $params);
}
