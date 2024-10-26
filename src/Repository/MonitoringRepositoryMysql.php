<?php

namespace RiseTech\Monitoring\Repository;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use RiseTech\Monitoring\Repository\Contracts\MonitoringRepositoryInterface;

class MonitoringRepositoryMysql implements MonitoringRepositoryInterface
{
    protected string $connection;
    protected string $table = 'monitorings';

    public function __construct(string $connection)
    {
        $this->connection = $connection;
    }

    public function create(array $data): void
    {
        DB::connection($this->connection)->table($this->table)->insert($data);
    }
}
