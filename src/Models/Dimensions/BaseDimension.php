<?php

namespace Aldeebhasan\FastBi\Models\Dimensions;

use Aldeebhasan\FastBi\Interfaces\IUDimension;
use Aldeebhasan\FastBi\Models\BaseModel;

class BaseDimension extends BaseModel implements IUDimension
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
        $this->data = (array)$data;
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
            $data = array_map(fn($item) => call_user_func($this->transformer, $item), $data);
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

    public function getName(): string
    {
        return $this->name;
    }

    public function build(): self
    {
        return $this->process();
    }
}
