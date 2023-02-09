<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BarChartWidget extends BaseChartWidget
{

    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            ...$this->prepare()
        ];
        return includeView(widgetPath('bar-chart.php'), $data);
    }
}