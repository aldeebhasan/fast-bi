<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class LineChartWidget extends BaseChartWidget
{
    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            ...$this->prepare()
        ];
        return includeView(widgetPath('line-chart.php'), $data);
    }
}