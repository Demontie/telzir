<?php

namespace SRC\Application\Repository;

use SRC\Domain\CallCost\GetCallDataValue;

class CallCost implements GetCallDataValue
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function getRateByOriginAndDestinyArea(int $from, int $to): float
    {

    }

    public function getPlanDataByPlanId(int $planId): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            `name`,
                                            duration
                                        FROM
                                            service_plan
                                        WHERE
                                            id = ?");
        $stmt->bindValue(1, $planId);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAreaCodeById(int $areaCode): string
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