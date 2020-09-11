<?php

namespace SRC\Domain\Plan;

interface GetPlanById
{
    public function find(int $id): array;
}