<?php

namespace SRC\Test;

use SRC\Domain\CallCost\GetCallDataValue;

class Repository implements GetCallDataValue
{
    public function getRateByOriginAndDestinyArea(int $from, int $to): float
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

    public function getPlanDataByPlanId(int $planId): array
    {
        $array = [
            1 => [
                'name' => 'FaleMais 30',
                'duration' => 30
            ],
            2 => [
                'name' => 'FaleMais 60',
                'duration' => 60
            ],
            3 => [
                'name' => 'FaleMais 120',
                'duration' => 120
            ]
        ];

        return $array[$planId];
    }

    public function getAreaCodeById(int $areaCode): string
    {
        $array = [
            1 => '011',
            2 => '016',
            3 => '017',
            4 => '018'
        ];

        return $array[$areaCode];
    }
}