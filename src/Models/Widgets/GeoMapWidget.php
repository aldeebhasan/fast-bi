<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class GeoMapWidget extends BaseWidget
{
    protected $view = 'geo-map';
    private $countries = [];

    public function countries(array $val): self
    {
        $this->countries = $val;
        return $this;
    }

    protected function handleDimensions(): array
    {
        if (empty($this->countries)) return [];
        $labels = $this->handleLabels();
        $attributes = [];
        $keys = array_keys($this->dimensions);

        for ($i = 0; $i < count($keys); $i++) {
            $key = $keys[$i];
            $dimension = $this->dimensions[$key];

            $label = $labels[$i] ?? ucfirst($key);
            $label = ($label == '*') ? ucfirst($key) : $label;
            foreach ($dimension as $idx => $value) {
                if (!isset($this->countries[$idx])) break;
                $attributes[$label][] = [
                    "value" => $value,
                    "code" => $this->countries[$idx]
                ];;
            }
        }

        return $attributes;
    }
}
