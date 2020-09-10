<?php

namespace SRC\Application\Repository;

class CallCost
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function findByAreaCodes(int $from, int $to)
    {
        $stmt = $this->connection->prepare("SELECT
                                            from
                                        FROM
                                            call_cost C
                                            LEFT JOIN contact CT ON CT.client_id = C.id AND CT.deleted_at IS NULL
                                        WHERE
                                            C.deleted_at IS NULL AND
                                            C.id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $data = [];

        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $key => $row) {
            $data['name'] = $row['name'];
            $data['identifier'] = $row['identifier'];
            $data['id'] = $row['id'];
            $data['typePerson'] = $row['typePerson'];
            $data['contacts'] = [];
            if (!empty($row['type'])) {
                $data['contacts'][] = [
                    'type' => $row['type'],
                    'id' => $row['contactId'],
                    'contact' => $row['contact'],
                ];
            }
        }

        return $data;
    }
}