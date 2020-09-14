<?php

namespace SRC\Test;

use SRC\Domain\CallCost\GetAreaCodeDataById;

class AreaCodeRepository implements GetAreaCodeDataById
{
    public function findCodeById(int $id): string
    {
        $array = [
            1 => '011',
            2 => '016',
            3 => '017',
            4 => '018'
        ];

        return $array[$id];
    }
}