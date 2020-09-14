<?php

namespace SRC\Domain\AreaCode;

interface GetAreaCodeById
{
    public function find(int $id): string;
}