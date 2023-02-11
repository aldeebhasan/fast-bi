<?php

namespace Aldeebhasan\FastBi\Manager;

use Aldeebhasan\FastBi\Models\Metrics\BaseMetric;
use Aldeebhasan\FastBi\Models\Widgets\BarChartWidget;
use Aldeebhasan\FastBi\Models\Widgets\BubbleChartWidget;
use Aldeebhasan\FastBi\Models\Widgets\NumberWidget;
use Aldeebhasan\FastBi\Models\Widgets\PieChartWidget;
use Aldeebhasan\FastBi\Models\Widgets\ScatterChartWidget;
use Aldeebhasan\FastBi\Models\Widgets\TableWidget;

/**
 * @method static TableWidget table(string $name)
 * @method static NumberWidget number(string $name)
 * @method static BarChartWidget barChart(string $name)
 * @method static BarChartWidget lineChart(string $name)
 * @method static ScatterChartWidget scatterChart(string $name)
 * @method static BubbleChartWidget bubbleChart(string $name)
 * @method static PieChartWidget pieChart(string $name)
 * @method static BaseMetric raw(string $name)
 */
class Widgets
{
    private static $namespace = 'Aldeebhasan\\FastBi\\Models\\Widgets\\';

    public static function __callStatic(string $name, array $arguments)
    {
        $class = self::$namespace . ucfirst($name) . 'Widget';
        if (!class_exists($class)) {
            $class = self::$namespace . 'BaseWidget';
        }
        return new $class(...$arguments);
    }
}
