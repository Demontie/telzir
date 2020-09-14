<?php

namespace SRC\Test;

use SRC\Domain\CallCost\GetPlanDataById;

class PlanRepository implements GetPlanDataById
{
    public function find(int $planId): array
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
}