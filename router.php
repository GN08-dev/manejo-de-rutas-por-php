<?php
class Router {
    private $controller;
    private $method;

    public function __construct() {
        $this->mathRoute();
    }

    public function mathRoute() {
        $url = explode("/", URL);

        $this->controller = isset($url[0]) && $url[0] !== '' ? ucfirst($url[0]) : 'Page';
        $this->method = isset($url[1]) && $url[1] !== '' ? $url[1] : 'home';

        $this->controller .= "Controller";

        $controllerPath = __DIR__ . '/controllers/' . $this->controller . '.php';
        if (!file_exists($controllerPath)) {
            die("Error: Controlador `$this->controller` no encontrado.");
        }

        require_once($controllerPath);
    }

    public function run() {
        $controller = new $this->controller();
        $method = $this->method;

        if (method_exists($controller, $method)) {
            $controller->$method();
        } else {
            die("Error: Método `$method` no encontrado en `$this->controller`.");
        }
    }
}