<?php

namespace SRC\Application\Repository;

class GetPlanById implements \SRC\Domain\Plan\GetPlanById
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function find(int $id): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            duration
                                        FROM
                                            service_plan
                                        WHERE
                                            id = ? AND
                                            deleted_at IS NULL");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetch()['duration'];
    }
}