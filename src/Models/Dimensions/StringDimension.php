<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

class StringDimension extends BaseDimension
{
    public function transform($data)
    {
        $this->setTransformer(\Closure::fromCallable([$this, 'itemTransform']));
        return parent::transform($data);
    }

    private function itemTransform($item): string
    {
        return (string)$item;
    }
}
