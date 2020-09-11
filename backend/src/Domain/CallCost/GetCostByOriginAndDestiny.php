<?php

namespace SRC\Domain\CallCost;

interface GetCostByOriginAndDestiny
{
    public function find(int $from, int $to): array;
}