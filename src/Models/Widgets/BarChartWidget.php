<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BarChartWidget extends BaseChartWidget
{
    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'bar',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}
