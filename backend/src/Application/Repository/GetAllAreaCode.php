<?php

namespace SRC\Application\Repository;

class GetAllAreaCode implements \SRC\Domain\AreaCode\GetAllAreaCode
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
                                            `code`
                                        FROM
                                            area_code
                                        WHERE
                                            deleted_at IS NULL");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}