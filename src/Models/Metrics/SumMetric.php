<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class SumMetric extends BaseMetric
{
    public function measure($data)
    {
        return array_sum($data);
    }
}
