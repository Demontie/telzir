<?php

namespace SRC\Application\Controller;

use SRC\Application\Boundery\InputCallData;
use SRC\Application\Repository\Connection;
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

    public function calculate($from, $to, $planId, $duration)
    {
        $inputData = new InputCallData(
            $from,
            $to,
            $planId,
            $duration
        );

        $areaCode = new GetAreaCodeDataById($this->connection);
        $plan = new PlanFindById($this->connection);
        $rate = new GetRate($this->connection);

        $domain = new \SRC\Domain\CallCost\CalculateCallCost(
            $areaCode,
            $plan,
            $rate
        );

        echo json_encode($domain->calculate($inputData));
    }
}