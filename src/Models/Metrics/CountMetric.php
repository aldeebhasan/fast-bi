<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class CountMetric extends BaseMetric
{
    public function measure($data)
    {
        return count($data);
    }
}
