<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class LineChartWidget extends BaseChartWidget
{
    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'line',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}