<?php

namespace Admin;

require_once (__DIR__ . '/../Database/Connection.php');
use Database\Connection as Connection;

class Admin 
{
    protected string $table = 'admins';

    public function startConnection()
    {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        return $connection;
    }

    public function findAdmin($username) {
        $connection = $this->startConnection();

        $statement = $connection->prepare('SELECT * FROM admins WHERE username = :username');

        $statement->execute(['username' => $username]);

        return $statement->fetch();
    }
}

?>