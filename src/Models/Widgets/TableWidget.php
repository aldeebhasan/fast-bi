<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class TableWidget extends BaseWidget
{

    public function prepare()
    {
        $labels = array_map(fn($x) => ucfirst($x), array_keys($this->dimensions));
        $maxAttributes = maxCount($this->dimensions);
        $attributes = [];
        for ($i = 0; $i < $maxAttributes; $i++) {
            $attributes[] = array_reduce($this->dimensions, function ($carry, $dimension) use ($i) {
                array_push($carry, $dimension[$i] ?? "");
                return $carry;
            }, []);
        }
        $statistics = [];
        foreach ($this->metrics as $key => $metric) {
            $statistics [] = ['key' => ucfirst($key), 'value' => $metric];
        }
        return compact('labels', 'attributes', 'statistics');
    }

    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            ...$this->prepare()
        ];
        return includeView(widgetPath('table.php'), $data);
    }
}