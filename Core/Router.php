<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path('App/Controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    private function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);

        $file = base_path("views/{$code}.php");

        if (file_exists($file)) {
            require $file;
        } else {
            echo "file \"$file\" not found!";
        }

        die();
    }
}
