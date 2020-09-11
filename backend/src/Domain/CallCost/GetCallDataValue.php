<?php


namespace SRC\Domain\CallCost;


interface GetCallDataValue
{
    public function getRateByOriginAndDestinyArea(int $from, int $to): float;

    public function getPlanDataByPlanId(int $planId): array;

    public function getAreaCodeById(int $areaCode): string;
}