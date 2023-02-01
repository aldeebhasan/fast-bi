<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class SumMetric extends BaseMetric
{

    public function resolve()
    {
        return array_sum($this->data);
    }

}