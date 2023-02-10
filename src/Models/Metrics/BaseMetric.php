<?php

namespace Aldeebhasan\FastBi\Models\Metrics;

use Aldeebhasan\FastBi\Interfaces\IUMetric;

class BaseMetric implements IUMetric
{
    protected string $name;
    protected array $data;
    protected $processedData;
    protected $measure;

    public function __construct(string $name, $data)
    {
        $this->name = $name;
        $this->data = $data;
        $this->processedData = $data;
    }

    /**
     * @param callable $measure
     * @return $this
     */
    public function setMeasure(callable $measure): self
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

    protected function process(): self
    {
        $this->processedData = $this->measure($this->data);
        return $this;
    }

    public function getData()
    {
        return $this->processedData;
    }

    public function build(): self
    {
        return $this->process();
    }
}