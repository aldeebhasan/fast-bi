<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class AvgMetric extends BaseMetric
{
    public function measure($data)
    {
        return round(array_sum($data) / count($data), 3) ?? null;
    }
}
