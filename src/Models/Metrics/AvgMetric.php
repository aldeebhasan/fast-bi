<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class AvgMetric extends BaseMetric
{

    public function measure($data)
    {
        return array_sum($data) / count($data) ?? null;
    }

}