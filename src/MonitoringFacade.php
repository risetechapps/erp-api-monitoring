<?php

namespace RiseTech\Monitoring;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RiseTech\Monitoring\Skeleton\SkeletonClass
 */
class MonitoringFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'monitoring';
    }
}
