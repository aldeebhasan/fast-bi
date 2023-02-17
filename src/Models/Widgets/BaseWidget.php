<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

use Aldeebhasan\FastBi\Interfaces\IUDimension;
use Aldeebhasan\FastBi\Interfaces\IUMetric;
use Aldeebhasan\FastBi\Interfaces\IUWidget;
use Aldeebhasan\FastBi\Models\BaseModel;

class BaseWidget extends BaseModel implements IUWidget
{
    protected $labels = [];
    protected $dimensions = [];
    protected $metrics = [];
    protected $name = '';
    protected $key = '';
    protected $view = '';

    public function __construct(string $name)
    {
        $this->name = ucfirst($name);
        $this->key = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }

    public function labels(array $labels): IUWidget
    {
        $this->labels = $labels;
        return $this;
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
                if (is_numeric($name)) {
                    $name = $dimension->getName();
                }
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

    //--------------------------------------

    protected function handleMetrics(): array
    {
        $metrics = [];
        foreach ($this->metrics as $key => $metric) {
            $metrics [] = ['key' => ucfirst($key), 'value' => $metric];
        }
        return $metrics;
    }

    protected function handleLabels(): array
    {
        if (empty($this->labels)) {
            return array_keys($this->dimensions);
        }
        $maxLength = count($this->dimensions);
        $count = count($this->labels);
        $fill = [];
        if ($count < $maxLength) {
            $fill = array_fill(0, $maxLength - $count, "*");
        }
        return array_merge($this->labels, $fill);
    }

    protected function handleDimensions(): array
    {
        return $this->dimensions;
    }

    protected function handleOptions(): array
    {
        return [];
    }

    protected function prepare()
    {
        $labels = $this->handleLabels();
        $attributes = $this->handleDimensions();
        $statistics = $this->handleMetrics();
        $options = $this->handleOptions();
        return compact('labels', 'attributes', 'statistics', 'options');
    }

    /**
     * @throws \Exception
     */
    public function render()
    {
        if (!$this->view) {
            return "Widget is not supported";
        }
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            ...$this->prepare()
        ];
        return includeView(widgetPath("$this->view.php"), $data);
    }
}
