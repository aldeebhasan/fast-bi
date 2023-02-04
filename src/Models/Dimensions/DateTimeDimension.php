<?php


namespace Aldeebhasan\FastBi\Models\Dimensions;

class DateTimeDimension extends BaseDimension
{

    private $format = 'Y/m/d';

    public function setFormat(string $format)
    {
        $this->format = $format;
        return $this;
    }

    public function transform($data)
    {

        return array_map([$this, 'itemTransform'], $data);
    }

    private function itemTransform($item)
    {
        if (is_string($item)) {
            $date = date_create($item);
            return $date ? date_format($date, $this->format) : 'Not supported data';
        }
        return 'Not supported data';
    }

}