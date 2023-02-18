<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

class DateTimeDimension extends BaseDimension
{
    private $format = 'Y/m/d';

    public function format(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function transform($data)
    {
        $this->setTransformer(\Closure::fromCallable([$this, 'itemTransform']));
        return parent::transform($data);
    }

    private function itemTransform($item): string
    {
        if (is_string($item)) {
            $date = date_create($item);
            return $date ? date_format($date, $this->format) : 'Not supported data';
        }
        return 'Not supported data';
    }
}
