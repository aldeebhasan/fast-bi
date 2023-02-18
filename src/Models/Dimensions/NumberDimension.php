<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

class NumberDimension extends BaseDimension
{
    public function transform($data)
    {
        $this->setTransformer(\Closure::fromCallable([$this, 'itemTransform']));
        return parent::transform($data);
    }

    private function itemTransform($item): float
    {
        return round((float)$item, 2);
    }
}
