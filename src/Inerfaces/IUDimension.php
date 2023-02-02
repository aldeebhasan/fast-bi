<?php

namespace Aldeebhasan\FastBi\Inerfaces;

interface IUDimension
{
    public function transform($data);

    public function getData();

    public function build();
}