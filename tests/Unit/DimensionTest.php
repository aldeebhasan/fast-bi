<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Metrics;
use Aldeebhasan\FastBi\Models\Dimension\DateDimension;
use Aldeebhasan\FastBi\Test\TestCase;

class DimensionTest extends TestCase
{

    private $data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    function testDateDimension()
    {
        $dimension = new DateDimension("date", ['2023-5-5', '2024-6-6']);
        $result = $dimension->setFormat('Y-m')->build()->getData();
        self::assertEquals($result, ['2023-05', '2024-06']);
    }


}