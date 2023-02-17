<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BarChartWidget extends BaseChartWidget
{
    protected $type = 'bar';
    private $direction = 'x';

    public function vertical(): self
    {
        $this->direction = 'y';
        return $this;
    }

    protected function handleOptions(): array
    {
        return [
            'responsive' => true,
            "indexAxis" => $this->direction,
        ];
    }
}
