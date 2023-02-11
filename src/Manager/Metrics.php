<?php

namespace Aldeebhasan\FastBi\Manager;

use Aldeebhasan\FastBi\Models\Metrics\AvgMetric;
use Aldeebhasan\FastBi\Models\Metrics\BaseMetric;
use Aldeebhasan\FastBi\Models\Metrics\MaxMetric;
use Aldeebhasan\FastBi\Models\Metrics\MedianMetric;
use Aldeebhasan\FastBi\Models\Metrics\MinMetric;
use Aldeebhasan\FastBi\Models\Metrics\SumMetric;

/**
 * @method static SumMetric sum(string $name, array $data)
 * @method static MaxMetric max(string $name, array $data)
 * @method static MinMetric min(string $name, array $data)
 * @method static MedianMetric median(string $name, array $data)
 * @method static AvgMetric avg(string $name, array $data)
 * @method static BaseMetric raw(string $name, array $data)
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
