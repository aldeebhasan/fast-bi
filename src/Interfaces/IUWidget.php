<?php

namespace Aldeebhasan\FastBi\Interfaces;

use Aldeebhasan\FastBi\Models\Dimensions\BaseDimension;

interface IUWidget
{
    /**
     * @param array| BaseDimension $dimensions
     * @return IUWidget
     */
    public function dimensions($dimensions): IUWidget;

    public function render();
}