<?php

namespace Aldeebhasan\FastBi\Interfaces;

interface IUDimension
{
    public function transform($data);

    public function getData();

    public function build(): IUDimension;
}