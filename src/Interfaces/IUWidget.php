<?php

namespace Aldeebhasan\FastBi\Interfaces;

use Aldeebhasan\FastBi\Models\Dimensions\BaseDimension;
use Aldeebhasan\FastBi\Models\Metrics\BaseMetric;

interface IUWidget
{
    public function dimensions(array $dimensions): IUWidget;

    public function metrics(array $metrics): IUWidget;

    public function labels(array $labels): IUWidget;

    public function settings(array $settings): IUWidget;

    public function render();
}
