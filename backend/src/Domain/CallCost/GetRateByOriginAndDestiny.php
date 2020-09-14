<?php

namespace SRC\Domain\CallCost;

interface GetRateByOriginAndDestiny
{
    public function find(int $from, int $to): float;
}