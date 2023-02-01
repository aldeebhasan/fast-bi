<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MedianMetric extends BaseMetric
{

    public function resolve()
    {
        sort($this->data);
        $index = (count($this->data) / 2) - 1;
        return $this->data[$index] ?? null;
    }

}