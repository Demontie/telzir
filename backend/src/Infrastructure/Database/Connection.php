<?php

namespace SRC\Infrastructure\Database;

class Connection implements \SRC\Application\Repository\Connection
{
    public function getConnection()
    {
        try {
            $conn = new \PDO('mysql:host=db_telzir;dbname=telzir', 'root', 'root');
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (\PDOException $pdoException) {
            echo $pdoException->getMessage();
        }
    }
}