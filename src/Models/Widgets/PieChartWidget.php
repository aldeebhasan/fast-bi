<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class PieChartWidget extends BaseChartWidget
{
    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'pie',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}