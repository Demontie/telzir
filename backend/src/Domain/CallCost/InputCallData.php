<?php

namespace SRC\Domain\CallCost;

interface InputCallData
{
    public function getFrom(): int;

    public function getTo(): int;

    public function getPlan(): int;

    public function getDuration(): int;
}