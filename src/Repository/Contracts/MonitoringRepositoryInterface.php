<?php

namespace RiseTech\Monitoring\Repository\Contracts;

interface MonitoringRepositoryInterface
{
    public function create(array $data): void;
}
