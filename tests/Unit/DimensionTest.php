<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Dimensions;
use Aldeebhasan\FastBi\Test\TestCase;

class DimensionTest extends TestCase
{
    public function testDateDimension()
    {
        $dimension = Dimensions::dateTime("date", ['2023-5-5', '2024-6-6']);
        $result = $dimension->format('Y-m')->build()->getData();
        self::assertEquals($result, ['2023-05', '2024-06']);
    }

    public function testStringDimension()
    {
        $dimension = Dimensions::string("date", [1, 2, 3, 4]);
        $result = $dimension->build()->getData();
        self::assertEquals($result, ["1", "2", "3", "4"]);
        self::assertIsString($result[0]);
    }

    public function testCustomMetric()
    {
        $metric = Dimensions::raw('name', [1, 2, 3, 4])
            ->setTransformer(fn ($x) => $x - 1)
            ->build();
        $result = $metric->getData();
        self::assertEquals($result, [0, 1, 2, 3]);
    }
}
