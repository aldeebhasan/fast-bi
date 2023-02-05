<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

use Aldeebhasan\FastBi\Interfaces\IUDimension;
use Aldeebhasan\FastBi\Interfaces\IUMetric;
use Aldeebhasan\FastBi\Interfaces\IUWidget;

class BaseWidget implements IUWidget
{
    protected $dimensions;
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }


    public function dimensions($dimensions): IUWidget
    {
        $finalDimensions = [];
        foreach ($dimensions as $dimension) {
            if ($dimension instanceof IUDimension) {
                $finalDimensions[] = (array)$dimension->build()->getData();
            } elseif ($dimension instanceof IUMetric) {
                $finalDimensions[] = (array)$dimension->build()->getData();
            } else {
                $finalDimensions[] = (array)$dimension;
            }
        }
        $this->dimensions = $finalDimensions;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function render()
    {
       return "Widget is not supported";
    }
}