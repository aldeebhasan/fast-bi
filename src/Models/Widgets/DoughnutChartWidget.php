<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class DoughnutChartWidget extends BaseChartWidget
{
    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'doughnut',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}
