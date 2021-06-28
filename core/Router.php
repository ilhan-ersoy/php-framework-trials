<?php

namespace app\core;

use app\core\Request;

class Router
{
    public Request $request;

    protected array $routes = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Not Found!";
            exit();
        }

        echo call_user_func($callback);
    }

}