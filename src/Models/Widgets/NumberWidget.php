<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class NumberWidget extends BaseWidget
{
    protected $view = 'number';

    protected function handleDimensions(): array
    {
        $attributes = [];
        foreach ($this->dimensions as $dimension) {
            $attributes[] = reset($dimension);
        }
        return $attributes;
    }
}
