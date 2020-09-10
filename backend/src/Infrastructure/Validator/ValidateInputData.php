<?php

namespace SRC\Infrastructure\Validator;

use SRC\Domain\CallCost\InputCallData;

class ValidateInputData implements \SRC\Domain\CallCost\ValidateInputData
{
    public function validate(InputCallData $inputCallData): bool
    {
        $isValid = true;

        if (empty($inputCallData->getFrom())) {
            $isValid = false;
        }

        if (empty($inputCallData->getTo())) {
            $isValid = false;
        }

        if (empty($inputCallData->getPlan())) {
            $isValid = false;
        }

        if (empty($inputCallData->getDuration())) {
            $isValid = false;
        }

        return $isValid;
    }
}