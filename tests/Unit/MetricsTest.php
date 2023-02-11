<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Metrics;
use Aldeebhasan\FastBi\Test\TestCase;

class MetricsTest extends TestCase
{
    private $data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    public function testSumMetric()
    {
        $metric = Metrics::sum('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, 55);
    }

    public function testMedianMetric()
    {
        $metric = Metrics::median('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, 5);
    }

    public function testMinMetric()
    {
        $metric = Metrics::min('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, 1);
    }

    public function testMaxMetric()
    {
        $metric = Metrics::max('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, 10);
    }

    public function testAvgMetric()
    {
        $metric = Metrics::avg('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, 5.5);
    }

    public function testnotExistMetric()
    {
        $metric = Metrics::notFound('name', $this->data);
        $result = $metric->build()->getData();
        self::assertEquals($result, $this->data);
    }

    public function testCustomMetric()
    {
        $metric = Metrics::raw('name', $this->data)->setMeasure(fn ($data) => count($data))->build();
        $result = $metric->getData();
        self::assertEquals($result, count($this->data));
    }
}
