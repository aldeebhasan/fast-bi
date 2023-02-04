<?php


namespace Aldeebhasan\FastBi\Models\Dimensions;

class StringDimension extends BaseDimension
{


    public function transform($data)
    {

        return array_map([$this, 'itemTransform'], $data);
    }

    private function itemTransform($item)
    {
        return (string)$item;
    }

}