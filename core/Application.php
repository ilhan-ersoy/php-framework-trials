<?php

namespace app\core;
use app\core\Router;
class Application
{
    public Router $router;

    public Request $request;


    public function __construct()
    {
        $this->request = new Request(); // request
        $this->router = new Router($this->request); // router
    }
    
    public function run()
    {
        $this->router->resolve();
    }

}