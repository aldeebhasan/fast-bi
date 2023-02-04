<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Dimensions;
use Aldeebhasan\FastBi\Manager\Metrics;
use Aldeebhasan\FastBi\Manager\Widgets;
use Aldeebhasan\FastBi\Test\TestCase;

class WidgetTest extends TestCase
{

    function testTableWidget()
    {
        $widget = Widgets::table('table')
            ->headers(['id', 'name', 'email'])
            ->dimensions([
                ['1', 'Hasan', 'a@b.com'],
                ['1', 'Hasan', 'a@b.com', 15, 'count'],
                Metrics::sum('sum',[1,2,4])
            ])->render();
        self::assertNotNull($widget);
    }


    function testNotFoundWidget()
    {
        $widget = Widgets::table('table')
            ->headers(['id', 'name', 'email'])
            ->dimensions([
                ['1', 'Hasan', 'a@b.com'],
                ['1', 'Hasan', 'a@b.com', 15, 'count'],
            ])->render();
        self::assertNotNull($widget);
    }

}