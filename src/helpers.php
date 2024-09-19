<?php

declare(strict_types=1);

if (!function_exists('loggly')) {
    function loggly(): RiseTech\Monitoring\Loggly\Loggly
    {
        return app(\RiseTech\Monitoring\Loggly\Loggly::class);
    }
}

//if (!function_exists('monitoring')) {
//    function monitoring(): \RiseTech\Monitoring\Contracts\MonitoringRepository
//    {
//        return app(\RiseTech\Monitoring\Contracts\MonitoringRepository::class);
//    }
//}
