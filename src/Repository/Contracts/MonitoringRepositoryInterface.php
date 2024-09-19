<?php

namespace RiseTech\Monitoring\Repository\Contracts;
use Illuminate\Support\Collection;

interface MonitoringRepositoryInterface
{
    public function create(array $data): void;
    public function getAllEvents(): Collection;
    public function getEventById(string $id);
    public function getEventsByTypes(string $type);

}
