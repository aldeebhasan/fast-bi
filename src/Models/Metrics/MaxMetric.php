<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MaxMetric extends BaseMetric
{
    public function measure($data)
    {
        return max($data);
    }
}
