<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class MinMetric extends BaseMetric
{

    public function resolve()
    {
        return min($this->data);
    }

}