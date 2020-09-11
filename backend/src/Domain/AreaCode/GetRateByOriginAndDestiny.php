<?php

namespace SRC\Domain\AreaCode;

interface GetRateByOriginAndDestiny
{
    public function find(int $origin, int $destiny): array;
}