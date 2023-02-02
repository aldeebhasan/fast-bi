<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

use Aldeebhasan\FastBi\Inerfaces\IUMetric;

class BaseMetric implements IUMetric
{
    protected string $name;
    protected array $data;
    protected $processedData;
    protected $measure;

    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->data = $data;
        $this->processedData = $data;
    }

    /**
     * @param callable $measure
     * @return $this
     */
    public function setMeasure(callable $measure)
    {
        $this->measure = $measure;
        return $this;
    }

    public function measure($data)
    {
        if ($this->measure && is_callable($this->measure)) {
            $data = call_user_func($this->measure, $data);
        }
        return $data;
    }

    protected function process()
    {
        $this->processedData = $this->measure($this->data);
        return $this;
    }

    public function getData()
    {
        return $this->processedData;
    }

    public function build()
    {
        return $this->process();
    }
}