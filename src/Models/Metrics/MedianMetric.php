<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MedianMetric extends BaseMetric
{

    public function measure($data)
    {
        sort($data);
        $index = (count($data) / 2) - 1;
        return $data[$index] ?? null;
    }

}