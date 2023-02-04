<?php

namespace Aldeebhasan\FastBi\Manager;

use Aldeebhasan\FastBi\Models\Dimensions\BaseDimension;
use Aldeebhasan\FastBi\Models\Dimensions\DateTimeDimension;
use Aldeebhasan\FastBi\Models\Dimensions\StringDimension;

/**
 * @method static DateTimeDimension dateTime(string $name, array $data)
 * @method static StringDimension string(string $name, array $data)
 * @method static BaseDimension raw(string $name, array $data)
 */
class Dimensions
{
    private static $namespace = 'Aldeebhasan\\FastBi\\Models\\Dimensions\\';

    public static function __callStatic(string $name, array $arguments)
    {
        $class = self::$namespace . ucfirst($name) . 'Dimension';
        if (!class_exists($class)) {
            $class = self::$namespace . 'BaseDimension';
        }
        return new $class(...$arguments);
    }
}