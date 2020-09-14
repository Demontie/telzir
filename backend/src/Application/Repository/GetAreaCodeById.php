<?php

namespace SRC\Application\Repository;

class GetAreaCodeById implements \SRC\Domain\AreaCode\GetAreaCodeById
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function find(int $areaCode): string
    {
        $stmt = $this->connection->prepare("SELECT
                                            code
                                        FROM
                                            area_code
                                        WHERE
                                            id = ?");
        $stmt->bindValue(1, $areaCode);
        $stmt->execute();
        return $stmt->fetch()['code'];
    }
}