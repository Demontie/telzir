<?php

namespace SRC\Application\Controller;

use SRC\Application\Repository\Connection;
use SRC\Application\Repository\GetPlan;
use SRC\Domain\Plan\GetAllPlanData;

class PlanFindAll
{
    public function findAll(Connection $connection)
    {
        $repository = new GetPlan($connection);
        $domain = new GetAllPlanData($repository);

        echo json_encode($domain->findAll());
    }
}