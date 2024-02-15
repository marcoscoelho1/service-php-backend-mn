<?php
class Router
{
    private $routes = [];

    public function addRoute($path, $method, $controller, $action)
    {
        $this->routes[] = ['path' => $path, 'method' => $method, 'controller' => $controller, 'action' => $action];
    }

    public function route($requestPath, $requestMethod)
    {
        foreach ($this->routes as $route) {
            $routePath = preg_replace('#/{(\w+)}#', '/([^/]+)', $route['path']);
            $routePath = str_replace('/', '\/', $routePath);

            if (preg_match("#^$routePath$#", $requestPath, $matches) && $route['method'] === $requestMethod) {
                array_shift($matches); // Removendo a primeira correspondência que é o caminho completo
                $parameters = [$matches[0]]; // Pegando apenas o primeiro parâmetro capturado
                return ['controller' => $route['controller'], 'action' => $route['action'], 'parameters' => $parameters];
            }
        }
        return null;
    }
}
