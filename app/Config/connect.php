<?php

define('HOST', 'mysql');
define('DATABASE_NAME', 'crud_user');
define('USER', 'root');
define('PASSWORD', 'root');

class Connect
{
    protected $connection;

    function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE_NAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Failed to connect to database: " . $e->getMessage());
        }
    }
}
