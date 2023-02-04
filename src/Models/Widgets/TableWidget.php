<?php

namespace Aldeebhasan\FastBi\Models\Widgets;

class TableWidget extends BaseWidget
{
    private $headers = [];

    public function headers($data): self
    {
        $this->headers = (array)$data;
        return $this;
    }

    public function render()
    {
        $data = [
            'id' => $this->name,
            'maxColumnCount' => max(count($this->headers), maxCount($this->dimensions)),
            'headers' => $this->headers,
            'rows' => $this->dimensions
        ];
        return includeView(widgetPath('table.php'), $data);
    }
}