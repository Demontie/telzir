<?php

namespace SRC\Application\Repository;


class GetPlan implements \SRC\Domain\Plan\GetPlan
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT
                                            id,
                                            `name`
                                        FROM
                                            service_plan
                                        WHERE
                                            deleted_at IS NULL");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}