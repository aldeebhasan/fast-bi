<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

class NumberDimension extends BaseDimension
{
    public function transform($data)
    {
        return array_map([$this, 'itemTransform'], $data);
    }

    private function itemTransform($item)
    {
        return round((float)$item, 2);
    }
}
