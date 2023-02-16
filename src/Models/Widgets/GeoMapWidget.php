<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class GeoMapWidget extends BaseWidget
{
    protected $view = 'geo-map';

    protected function handleLabels(): array
    {
        //handle labels
        $labels = $this->dimensions[array_keys($this->dimensions)[0]] ?? [];
        $labels = array_map(fn($x) => strtoupper($x), $labels);
        return $labels;
    }

    protected function handleDimensions(): array
    {
        $labels = $this->handleLabels();
        $attributes = [];
        $keys = array_keys($this->dimensions);

        for ($i = 1; $i < count($keys); $i++) {
            $key = $keys[$i];
            $dimension = $this->dimensions[$key];

            foreach ($dimension as $idx => $value) {
                $attributes[ucfirst($key)][] = [
                    "value" => $value,
                    "code" => $labels[$idx]
                ];;
            }
        }

        return $attributes;
    }
}
