<?php

namespace SRC\Application\Controller;

use SRC\Application\Repository\Connection;
use SRC\Application\Repository\GetPlanById;
use SRC\Domain\Plan\GetPlanDataById;

class PlanFindById implements \SRC\Domain\CallCost\GetPlanDataById
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

    public function find(int $id)
    {
        $repository = new GetPlanById($this->connection);
        $domain = new GetPlanDataById($repository);

        return $domain->find($id);
    }
}