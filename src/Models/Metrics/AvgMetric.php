<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class AvgMetric extends BaseMetric
{

    public function resolve()
    {
        return array_sum($this->data) / count($this->data) ?? null;
    }

}