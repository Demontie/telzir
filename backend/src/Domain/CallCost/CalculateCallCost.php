<?php

namespace SRC\Domain\CallCost;

class CalculateCallCost
{
    private ValidateInputData $validator;

    private GetCallDataValue $repository;

    public function __construct(
        ValidateInputData $validateInputData,
        GetCallDataValue $getCallDataValue
    )
    {
        $this->validator = $validateInputData;
        $this->repository = $getCallDataValue;
    }

    public function calculate(InputCallData $inputCallData)
    {

    }
}