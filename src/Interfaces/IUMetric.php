<?php

namespace Aldeebhasan\FastBi\Interfaces;

interface IUMetric
{
    public function measure($data);

    public function getData();

    public function getName(): string;

    public function build(): IUMetric;
}
