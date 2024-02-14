<?php
require_once('./Config/connect.php');

class UserModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'address';
    }

    function getAll()
    {
        $sqlQuery = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlQuery->fetchAll();
        return $resultQuery;
    }

    function getById()
    {
        $sqlQuery = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlQuery->fetchAll();
        return $resultQuery;
    }
}
