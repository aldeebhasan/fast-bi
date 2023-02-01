<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Metrics;
use Aldeebhasan\FastBi\Test\TestCase;

class MetricsTest extends TestCase
{

    private $data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    function testSumMetric()
    {
        $metric = Metrics::sum('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, 55);
    }

    function testMedianMetric()
    {
        $metric = Metrics::median('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, 5);
    }

    function testMinMetric()
    {
        $metric = Metrics::min('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, 1);
    }

    function testMaxMetric()
    {
        $metric = Metrics::max('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, 10);
    }

    function testAvgMetric()
    {
        $metric = Metrics::avg('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, 5.5);
    }

    function testnotExistMetric()
    {
        $metric = Metrics::notFound('name', $this->data);
        $result = $metric->resolve();
        self::assertEquals($result, $this->data);
    }
}