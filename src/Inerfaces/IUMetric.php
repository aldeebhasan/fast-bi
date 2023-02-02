<?php

namespace Aldeebhasan\FastBi\Inerfaces;

interface IUMetric
{
    public function measure($data);

    public function getData();

    public function build();
}