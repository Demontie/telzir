<?php

namespace SRC\Application\Controller;

use SRC\Application\Repository\Connection;
use SRC\Application\Repository\GetAllAreaCode;
use SRC\Domain\AreaCode\GetAllAreaCodeData;

class AreaCodeFindAll
{
    public function findAll(Connection $connection)
    {
        $repository = new GetAllAreaCode($connection);
        $domain = new GetAllAreaCodeData($repository);

        echo json_encode($domain->findAll());
    }
}