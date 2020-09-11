<?php

namespace SRC\Application\Repository;


use SRC\Domain\AreaCode\GetRateByOriginAndDestiny;

class GetRateByOriginAndDistiny implements GetRateByOriginAndDestiny
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function find(int $origin, int $destiny): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            rate
                                        FROM
                                            call_cost
                                        WHERE
                                            `from` = ? AND
                                            `to` = ?");
        $stmt->bindValue(1, $origin);
        $stmt->bindValue(2, $destiny);
        $stmt->execute();

        $data = $stmt->fetch();

        return $data ? $data['rate'] : 0;
    }
}