<?php
require_once('./Model/UserModel.php');

class UserController
{

    private $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    function getAll()
    {
        $result = $this->userModel->getAll();
        var_dump($result);
    }

    public function createUser(array $userData): bool
    {
        $user = new User();
        $user->setName($userData['name']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setAddressId($userData['addressId']);

        return $this->userModel->createUser($user);
    }
}
