<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

use Aldeebhasan\FastBi\Interfaces\IUDimension;
use Aldeebhasan\FastBi\Interfaces\IUMetric;
use Aldeebhasan\FastBi\Interfaces\IUWidget;

class BaseWidget implements IUWidget
{
    protected $dimensions = [];
    protected $metrics = [];
    protected $name = '';
    protected $key = '';

    public function __construct(string $name)
    {
        $this->name = ucfirst($name);
        $this->key = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }


    public function dimensions(array $dimensions): IUWidget
    {
        $finalDimensions = [];
        foreach ($dimensions as $name => $dimension) {
            if ($dimension instanceof IUDimension) {
                if (is_numeric($name)) {
                    $name = $dimension->getName();
                }
                $finalDimensions[$name] = (array)$dimension->build()->getData();
            } elseif ($dimension instanceof IUMetric) {
                $finalDimensions[$name] = (array)$dimension->build()->getData();
            } else {
                $finalDimensions[$name] = (array)$dimension;
            }
        }
        $this->dimensions = $finalDimensions;
        return $this;
    }

    public function metrics(array $metrics): IUWidget
    {
        $finalMetrics = [];
        foreach ($metrics as $name => $metric) {
            if ($metric instanceof IUMetric) {
                if (is_numeric($name)) {
                    $name = $metric->getName();
                }
                $finalMetrics[$name] = (string)$metric->build()->getData();
            } else {
                $finalMetrics[$name] = (string)$metric;
            }
        }
        $this->metrics = $finalMetrics;
        return $this;
    }

    protected function prepare()
    {
    }

    /**
     * @throws \Exception
     */
    public function render()
    {
        return "Widget is not supported";
    }
}
