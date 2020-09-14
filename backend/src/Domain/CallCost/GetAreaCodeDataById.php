<?php

namespace SRC\Domain\CallCost;

interface GetAreaCodeDataById
{
    public function findCodeById(int $id): string;
}