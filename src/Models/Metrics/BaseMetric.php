<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

class BaseMetric
{
    protected string $name;
    protected array $data;

    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->data = $data;
    }

    public function resolve()
    {

        return $this->data;
    }
}