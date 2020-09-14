<?php

namespace SRC\Domain\CallCost;

interface GetPlanDataById
{
    public function find(int $id);
}