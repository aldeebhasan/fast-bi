<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BubbleChartWidget extends ScatterChartWidget
{
    protected $radius = 10;

    public function render()
    {
        $data = [
            'key' => $this->key,
            'title' => $this->name,
            'type' => 'bubble',
            ...$this->prepare()
        ];
        return includeView(widgetPath('info-chart.php'), $data);
    }
}
