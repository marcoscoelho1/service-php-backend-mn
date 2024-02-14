<?php
require_once('./Controller/UserController.php');

$userController = new UserController();

$method = $_SERVER['REQUEST_METHOD'];

$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', $path);
$route = $parts[1];

// var_dump('chegou aqui');
// die();

if ($route === 'users' && $method === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);


    $success = $userController->createUser($data);

    if ($success) {
        http_response_code(201);
        echo json_encode(['message' => 'User created successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Failed to create user']);
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Route not found']);
}
