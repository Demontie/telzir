<?php

namespace SRC\Test;

use SRC\Domain\CallCost\GetRateByOriginAndDestiny;

class GetRateRepository implements GetRateByOriginAndDestiny
{

    public function find(int $from, int $to): float
    {
        $array = [
            1 => [
                2 => 1.9,
                3 => 1.7,
                4 => 0.9
            ],
            2 => [
                1 => 2.9
            ],
            3 => [
                1 => 2.7
            ],
            4 => [
                1 => 1.9
            ]
        ];

        if (!empty($array[$from][$to])) {
            return $array[$from][$to];
        }

        return 0;
    }
}