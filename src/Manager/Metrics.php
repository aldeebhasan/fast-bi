<?php

namespace Aldeebhasan\FastBi\Manager;

use Aldeebhasan\FastBi\Models\Metrics\SumMetric;

/**
 * @method static SumMetric sum(string $name, array $data)
 * @method static SumMetric max(string $name, array $data)
 * @method static SumMetric min(string $name, array $data)
 * @method static SumMetric median(string $name, array $data)
 * @method static SumMetric avg(string $name, array $data)
 */
class Metrics
{
    private static $namespace = 'Aldeebhasan\\FastBi\\Models\\Metrics\\';

    public static function __callStatic(string $name, array $arguments)
    {
        $class = self::$namespace . ucfirst($name) . 'Metric';
        if (!class_exists($class)) {
            $class = self::$namespace . 'BaseMetric';
        }
        return new $class(...$arguments);
    }
}