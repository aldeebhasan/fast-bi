<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BarChartWidget extends BaseChartWidget
{
    protected $type = 'bar';

    protected function handleSettings(): array
    {
        return parent::handleSettings() + [
                "indexAxis" => $this->settings['direction'] ?? 'x',
            ];
    }
}
