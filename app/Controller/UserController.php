<?php
require_once('./Model/UserModel.php');
require_once('./Shared/HttpResponse.php');

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

    public function createUser(array $userData)
    {
        $user = new User();
        $user->setName($userData['name']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setAddressId($userData['addressId']);

        $createUser = $this->userModel->createUser($user);

        if ($createUser) {
            $response = new HttpResponse(200, ["message" => "created with success"]);
        } else {
            $response = new HttpResponse(500, ["message" => "error on create"]);
        }

        return $response;
    }

    public function getUserById(int $id)
    {
        $user = $this->userModel->getUserById($id);
        if ($user) {
            $response = new HttpResponse(200, $user);
        } else {
            $response = new HttpResponse(500, $user);
        }

        return $response;
    }

    public function updateUser($id, array $userData)
    {
        $user = new User();
        $user->setName($userData['name']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setAddressId($userData['addressId']);

        $updateUser = $this->userModel->updateUser($id, $user);

        if ($updateUser) {
            $response = new HttpResponse(200, ["message" => "updated with success"]);
        } else {
            $response = new HttpResponse(500, ["message" => "error on update"]);
        }

        return $response;
    }
}
