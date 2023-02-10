<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

use Aldeebhasan\FastBi\Interfaces\IUDimension;

class BaseDimension implements IUDimension
{
    protected string $name;
    protected array $data;
    protected $processedData;
    protected $transformer;

    /**
     * @param $name
     * @param $data
     */
    public function __construct(string $name, $data)
    {
        $this->name = $name;
        $this->data = $data;
        $this->processedData = $data;
    }


    public function setTransformer(callable $transformer): self
    {
        $this->transformer = $transformer;
        return $this;
    }

    public function transform($data)
    {
        if ($this->transformer && is_callable($this->transformer)) {
            $data = call_user_func($this->transformer, $data);
        }
        return $data;
    }

    protected function process(): self
    {
        $this->processedData = $this->transform($this->data);
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