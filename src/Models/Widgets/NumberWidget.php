<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class NumberWidget extends BaseWidget
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
        $attributes = [];
        foreach ($this->dimensions as $dimension) {
            $attributes[] = reset($dimension);
        }
        return $attributes;
    }

    protected function prepare()
    {
        $labels = array_map(fn ($x) => ucfirst($x), array_keys($this->dimensions));
        $attributes = $this->handleDimensions();
        $statistics = $this->handleMetrics();
        return compact('labels', 'attributes', 'statistics');
    }

    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            ...$this->prepare()
        ];
        return includeView(widgetPath('number.php'), $data);
    }
}
