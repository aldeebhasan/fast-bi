<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class ScatterChartWidget extends BaseChartWidget
{
    protected $type = 'scatter';
    protected $radius = 1;

    protected function handleLabels(): array
    {
        $maxLength = count($this->dimensions) - 1;
        $count = count($this->labels);
        $fill = [];
        if ($count < $maxLength) {
            $fill = array_fill(0, $maxLength - $count, "*");
        }
        return array_merge($this->labels, $fill);
    }

    protected function handleDimensions(): array
    {
        $maxLength = maxCount($this->dimensions);
        $maxDB = count($this->dimensions);
        $keys = array_keys($this->dimensions);
        $labels = $this->handleLabels();
        $attributes = [];
        for ($i = 1; $i < $maxDB; $i++) {
            $axis_1 = $keys[0] ?? null;
            $axis_2 = $keys[$i] ?? null;
            for ($j = 0; $j < $maxLength; $j++) {
                $label = $labels[$i-1] ?? ucfirst("$axis_2 to $axis_1");
                $label = ($label == '*') ? ucfirst("$axis_2 to $axis_1") : $label;
                $attributes[$label][] = [
                    'x' => $this->dimensions[$axis_1][$j] ?? 0,
                    'y' => $this->dimensions[$axis_2][$j] ?? 0,
                    'r' => rand(1, $this->radius)
                ];
            }
        }
        return $attributes;
    }
}
