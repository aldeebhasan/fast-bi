<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class ScatterChartWidget extends BaseChartWidget
{
    protected $radius = 1;

    protected function handleDimensions(): array
    {
        $maxLength = maxCount($this->dimensions);
        $maxDB = count($this->dimensions);
        $keys = array_keys($this->dimensions);

        $attributes = [];
        for ($i = 1; $i < $maxDB; $i++) {
            $axis_1 = $keys[0] ?? null;
            $axis_2 = $keys[$i] ?? null;
            for ($j = 0; $j < $maxLength; $j++) {
                $attributes["$axis_1-$axis_2"][] = [
                    'x' => $this->dimensions[$axis_1][$j] ?? 0,
                    'y' => $this->dimensions[$axis_2][$j] ?? 0,
                    'r' => rand(1, $this->radius)
                ];
            }
        }
        return $attributes;
    }

    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'scatter',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}