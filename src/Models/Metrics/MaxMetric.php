<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MaxMetric extends BaseMetric
{

    public function resolve()
    {
        return max($this->data);
    }

}