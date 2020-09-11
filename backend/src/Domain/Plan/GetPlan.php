<?php

namespace SRC\Domain\Plan;

interface GetPlan
{
    public function findAll(): array;
}