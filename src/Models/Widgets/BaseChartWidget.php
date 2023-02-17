<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

abstract class BaseChartWidget extends BaseWidget
{
    protected $type = '';
    protected $view = 'info-chart';

    protected function handleLabels(): array
    {
        $maxLength = maxCount($this->dimensions);
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
        $attributes = [];
        $keys = array_keys($this->dimensions);
        for ($i = 0; $i < count($keys); $i++) {
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

    protected function handleSettings(): array
    {
        return [
            'responsive' => $this->settings['responsive'] ?? true,
        ];
    }

    protected function prepare()
    {
        return parent::prepare() + ['type' => $this->type];
    }
}
