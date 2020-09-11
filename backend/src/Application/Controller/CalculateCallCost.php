<?php

namespace SRC\Application\Controller;

use SRC\Application\Boundery\InputCallData;
use SRC\Application\Repository\CallCost;
use SRC\Application\Repository\Connection;
use SRC\Domain\CallCost\GetCallDataValue;
use SRC\Domain\CallCost\ValidateInputData;

class CalculateCallCost
{
    private Connection $connection;

    public function __construct(
        Connection $connection
    )
    {
        $this->connection = $connection;
    }

    public function calculate($from, $to, $plan, $duration)
    {
        $inputData = new InputCallData(
            $from,
            $to,
            $plan,
            $duration
        );

        $repository = new CallCost($this->connection);

        $data = (new \SRC\Domain\CallCost\CalculateCallCost($repository))
            ->calculate($inputData);

        echo json_encode($data);
    }
}