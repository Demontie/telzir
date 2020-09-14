<?php

namespace SRC\Application\Controller;

use SRC\Application\Repository\Connection;
use SRC\Application\Repository\GetRateByOriginAndDistiny;
use SRC\Domain\CallCost\GetRateByOriginAndDestiny;

class GetRate implements GetRateByOriginAndDestiny
{
    private Connection $connection;

    /**
     * PlanFindById constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function find(int $from, int $to): float
    {
        $repository = new GetRateByOriginAndDistiny($this->connection);
        $domain = new \SRC\Domain\AreaCode\GetRate($repository);

        return $domain->find($from, $to);
    }
}