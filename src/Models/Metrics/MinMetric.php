<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MinMetric extends BaseMetric
{
    public function measure($data)
    {
        return min($data);
    }
}
