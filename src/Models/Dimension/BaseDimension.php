<?php

namespace Aldeebhasan\FastBi\Models\Dimension;

use Aldeebhasan\FastBi\Inerfaces\IUDimension;

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
    public function __construct($name, $data)
    {
        $this->name = $name;
        $this->data = $data;
        $this->processedData = $data;
    }

    /**
     * @param callable $transformer
     */
    public function setTransformer(callable $transformer): void
    {
        $this->transformer = $transformer;
    }

    public function transform($data)
    {
        if ($this->transformer && is_callable($this->transformer)) {
            $data = array_map(fn($item) => call_user_func($this->transformer, $item), $data);
        }
        return $data;
    }

    protected function process()
    {
        $this->processedData = $this->transform($this->data);
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