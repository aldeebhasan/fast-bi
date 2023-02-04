<?php

namespace Aldeebhasan\FastBi\Interfaces;

interface IUMetric
{
    public function measure($data);

    public function getData();

    public function build(): IUMetric;
}