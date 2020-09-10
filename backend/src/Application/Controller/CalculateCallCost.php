<?php

namespace SRC\Application\Controller;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\InputCallData;
use SRC\Domain\CallCost\GetCallDataValue;
use SRC\Domain\CallCost\ValidateInputData;

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

    public function calculate(Request $request)
    {
        $inputData = new InputCallData(
            $request->input('from'),
            $request->input('to'),
            $request->input('plan'),
            $request->input('duration')
        );

        $data = (new \SRC\Domain\CallCost\CalculateCallCost(
            $this->validator,
            $this->repository
        ))->calculate($inputData);
    }
}