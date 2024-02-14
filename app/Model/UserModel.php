<?php
require_once('./Config/connect.php');
require_once('./Entity/User.php');

class UserModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    function getAll()
    {
        $sqlQuery = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlQuery->fetchAll();
        return $resultQuery;
    }

    function createUser(User $user)
    {
        $sql = "INSERT INTO users (name, email, password, address_id, created_at, updated_at) 
                VALUES (:name, :email, :password, :addressId, :created_at, :updated_at)";

        $statement = $this->connection->prepare($sql);

        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $addressId = $user->getAddressId();
        $createdAt = date('Y-m-d H:i:s');
        $updatedAt = date('Y-m-d H:i:s');

        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':addressId', $addressId);
        $statement->bindParam(':created_at', $createdAt);
        $statement->bindParam(':updated_at', $updatedAt);

        return $statement->execute();
    }
}
