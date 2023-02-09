<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class BaseChartWidget extends BaseWidget
{

    private $labels = [];

    function labels($data)
    {
        $this->labels = $data;
        return $this;
    }

    public function prepare()
    {
        $maxLength = maxCount($this->dimensions);
        //handle labels
        $labels = $this->labels;
        $count = count($labels);
        if ($count != $maxLength) {
            $fill = array_fill(0, $maxLength - $count, "*");
            $labels = array_merge($labels, $fill);
        }
        //handle attributes
        $attributes = [];
        foreach ($this->dimensions as $key => $dimension) {
            $count = count($dimension);
            if ($count != $maxLength) {
                $fill = array_fill(0, $maxLength - $count, 0);
                $attributes[$key] = array_merge($dimension, $fill);
            } else {
                $attributes[$key] = $dimension;
            }
        }
        $statistics = [];
        foreach ($this->metrics as $key => $metric) {
            $statistics [] = ['key' => ucfirst($key), 'value' => $metric];
        }
        $options = [
            'responsive' => true,
            'stacked' => false,
        ];
        return compact('labels', 'attributes', 'statistics', 'options');
    }


}