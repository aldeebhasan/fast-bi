<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class TableWidget extends BaseWidget
{
    protected $view = 'table';

    protected function handleDimensions(): array
    {
        $maxAttributes = maxCount($this->dimensions);
        $attributes = [];
        for ($i = 0; $i < $maxAttributes; $i++) {
            $attributes[] = array_reduce($this->dimensions, function ($carry, $dimension) use ($i) {
                array_push($carry, $dimension[$i] ?? "");
                return $carry;
            }, []);
        }
        return $attributes;
    }
}
