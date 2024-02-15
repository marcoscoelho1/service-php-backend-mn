<?php
require_once('./Shared/Router.php');
require_once('./Controller/UserController.php');
require_once('./Controller/AddressController.php');
require_once('./Controller/CityController.php');
require_once('./Controller/StateController.php');

$userController = new UserController();
$addressController = new AddressController();
$cityController = new CityController();
$stateController = new StateController();
$router = new Router();

// ROTAS
$router->addRoute('/users', 'GET', $userController, 'getAll');
$router->addRoute('/users', 'POST', $userController, 'createUser');
$router->addRoute('/users/{id}', 'GET', $userController, 'getUserById');
$router->addRoute('/users/{id}', 'PUT', $userController, 'updateUser');
$router->addRoute('/users/{id}', 'DELETE', $userController, 'deleteUser');

$router->addRoute('/address', 'GET', $addressController, 'getAll');
$router->addRoute('/address/{id}', 'GET', $addressController, 'getById');

$router->addRoute('/city', 'GET', $cityController, 'getAll');
$router->addRoute('/city/{id}', 'GET', $cityController, 'getById');

$router->addRoute('/state', 'GET', $stateController, 'getAll');
$router->addRoute('/state/{id}', 'GET', $stateController, 'getById');

$requestPath = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$route = $router->route($requestPath, $requestMethod);

if ($route !== null) {
    $controller = $route['controller'];
    $action = $route['action'];
    $parameters = $route['parameters'];
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data === null && ($requestMethod === 'POST' || $requestMethod === 'PUT')) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid JSON data']);
    } else {
        if ($requestMethod === 'POST') {
            $response = call_user_func([$controller, $action], $data, $parameters[0]);
        } else if ($requestMethod === 'PUT') {
            $response = call_user_func([$controller, $action], $parameters[0], $data);
        } else {
            $response = call_user_func([$controller, $action], $parameters[0]);
        }

        if ($response) {
            http_response_code($response->getStatusCode());
            echo $response->getFormatedResponse();
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Operation failed']);
        }
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Route not found']);
}
