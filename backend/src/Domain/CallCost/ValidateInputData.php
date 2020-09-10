<?php

namespace SRC\Domain\CallCost;

interface ValidateInputData
{
    public function validate(InputCallData $inputCallData): bool;
}