<?php

namespace Aldeebhasan\FastBi\Test\Unit;

use Aldeebhasan\FastBi\Manager\Dimensions;
use Aldeebhasan\FastBi\Manager\Metrics;
use Aldeebhasan\FastBi\Manager\Widgets;
use Aldeebhasan\FastBi\Test\TestCase;

class WidgetTest extends TestCase
{
    public function testTableWidget()
    {
        $widget = Widgets::table('table')
            ->dimensions([
                'id' => ['1', '2', '3'],
                ['1', 'Hasan', 'a@b.com', 15, 'count'],
                Metrics::sum('sum', [1, 2, 4])
            ])->render();
        self::assertNotNull($widget);
    }

    public function testBarChartWidget()
    {
        $widget = Widgets::barChart('chart')
            ->dimensions([
                'ages' => ['15', '14', '13', '11', '10'],
                'tall' => ['60', '60', '50', '66', '51'],
                'weight' => ['60', '60'],
            ])->render();
        self::assertNotNull($widget);
    }

    public function testLineChartWidget()
    {
        $widget = Widgets::lineChart('chart')
            ->dimensions([
                'ages' => ['15', '14', '13', '11', '10'],
                'tall' => ['60', '60', '50', '66', '51'],
                'weight' => ['60', '60'],
            ])->render();
        self::assertNotNull($widget);
    }

    public function testScatterChartWidget()
    {
        $widget = Widgets::scatterChart('chart')
            ->dimensions([
                'year' => ['2015', '2014', '2013', '2011', '2010'],
                'invoices-1`' => ['60', '60', '50', '66', '51'],
                'invoices-2' => ['80', '90', '100', '115'],
            ])->render();
        self::assertNotNull($widget);
    }

    public function testBibbleChartWidget()
    {
        $widget = Widgets::bubbleChart('chart')
            ->dimensions([
                'year' => ['2015', '2014', '2013', '2011', '2010'],
                'invoices-1`' => ['60', '60', '50', '66', '51'],
                'invoices-2' => ['80', '90', '100', '115'],
            ])->render();
        self::assertNotNull($widget);
    }

    public function testPieChartWidget()
    {
        $widget = Widgets::pieChart('chart')
            ->dimensions([
                'year' => ['2015', '2014', '2013', '2011', '2010'],
                'invoices-1`' => ['60', '60', '50', '66', '51'],
                'invoices-2' => ['80', '90', '100', '115'],
            ])->render();
        self::assertNotNull($widget);
    }

    public function testNotFoundWidget()
    {
        $widget = Widgets::table('table')
            ->dimensions([
                ['1', 'Hasan', 'a@b.com'],
                ['1', 'Hasan', 'a@b.com', 15, 'count'],
            ])->render();
        self::assertNotNull($widget);
    }
}
