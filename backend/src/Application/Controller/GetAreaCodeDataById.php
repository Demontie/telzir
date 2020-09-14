<?php

namespace SRC\Application\Controller;

use SRC\Application\Repository\Connection;
use SRC\Application\Repository\GetAreaCodeById;

class GetAreaCodeDataById implements \SRC\Domain\CallCost\GetAreaCodeDataById
{
    private Connection $connection;

    /**
     * GetAreaCodeDataById constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findCodeById(int $id): string
    {
        $repository = new GetAreaCodeById($this->connection);
        $domain = new \SRC\Domain\AreaCode\GetAreaCodeDataById($repository);
        return $domain->find($id);
    }
}