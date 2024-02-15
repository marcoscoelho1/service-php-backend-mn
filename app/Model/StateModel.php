<?php
require_once('./Config/connect.php');

class StateModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'state';
    }

    function getAll()
    {
        $sqlQuery = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlQuery->fetchAll();
        return $resultQuery;
    }

    function getById(int $id)
    {
        $sql = "SELECT * FROM $this->table where id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $resultQuery = $statement->fetch();
        return $resultQuery;
    }
}
