<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BaseChartWidget extends BaseWidget
{


    protected function handleMetrics(): array
    {
        $statistics = [];
        foreach ($this->metrics as $key => $metric) {
            $statistics [] = ['key' => ucfirst($key), 'value' => $metric];
        }
        return $statistics;
    }

    protected function handleDimensions(): array
    {
        $maxLength = maxCount($this->dimensions);
        $attributes = [];
        $keys = array_keys($this->dimensions);
        for ($i = 1; $i < count($keys); $i++) {
            $key = $keys[$i];
            $dimension = $this->dimensions[$key];
            $count = count($dimension);
            if ($count != $maxLength) {
                $fill = array_fill(0, $maxLength - $count, 0);
                $attributes[$key] = array_merge($dimension, $fill);
            } else {
                $attributes[$key] = $dimension;
            }
        }
        return $attributes;
    }

    function handleOptions()
    {
        return [
            'responsive' => true,
        ];
    }


    protected function handleLabels(): array
    {
        $maxLength = maxCount($this->dimensions);
        if ($maxLength == 0) return [];
        //handle labels
        $labels = $this->dimensions[array_keys($this->dimensions)[0]] ?? [];
        $count = count($labels);
        if ($count != $maxLength) {
            $fill = array_fill(0, $maxLength - $count, "*");
            $labels = array_merge($labels, $fill);
        }
        return $labels;
    }

    protected function prepare()
    {
        $labels = $this->handleLabels();
        $attributes = $this->handleDimensions();
        $statistics = $this->handleMetrics();
        $options = $this->handleOptions();
        return compact('labels', 'attributes', 'statistics', 'options');
    }


}