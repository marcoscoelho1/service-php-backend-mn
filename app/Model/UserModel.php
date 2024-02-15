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
        $sqlQuery = $this->connection->query(
            "SELECT users.id as id,
                    users.name as name,
                    users.email as email,
                    a.name as street,
                    a.`number` as number,
                    a.zipCode as zipCode,
                    c.name as city,
                    s.name as state
               FROM users
              INNER JOIN address a 
                 ON a.id = users.address_id 
              INNER JOIN city c
                 ON c.id = a.id_city 
              INNER JOIN state s 
                 ON s.id = c.id_state"
        );
        $resultQuery = $sqlQuery->fetchAll();

        return $resultQuery;
    }

    function getUserById(int $id)
    {
        $sql = "SELECT users.id as id,
                    users.name as name,
                    users.email as email,
                    a.name as street,
                    a.`number` as number,
                    a.zipCode as zipCode,
                    c.name as city,
                    s.name as state
               FROM users
              INNER JOIN address a 
                 ON a.id = users.address_id 
              INNER JOIN city c
                 ON c.id = a.id_city 
              INNER JOIN state s 
                 ON s.id = c.id_state
              WHERE users.id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $resultQuery = $statement->fetch();
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

    function updateUser($id, User $user)
    {
        $sql = "UPDATE users 
                   SET name = :name,
                       email = :email,
                       password = :password,
                       address_id = :addressId,
                       updated_at = :updatedAt
                 WHERE id = :id";

        $statement = $this->connection->prepare($sql);

        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $addressId = $user->getAddressId();
        $updatedAt = date('Y-m-d H:i:s');

        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':addressId', $addressId);
        $statement->bindParam(':updatedAt', $updatedAt);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }

    public function deleteUser($id)
    {
        $sql = "DELETE from users  WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
