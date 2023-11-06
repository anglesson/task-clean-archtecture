<?php

namespace App\ToDo\Main;

use App\ToDo\Infrastructure\Api\Router;
use App\ToDo\Main\CompositionRoot;

class Application
{
    public function start(): void
    {
        $httpServer = CompositionRoot::createServer();
        $repository = CompositionRoot::createTaskRepository();
        $router = new Router($httpServer, $repository);
        $router->init();
        $httpServer->listen();
    }
}