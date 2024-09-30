<?php

namespace Test\Main\Factories;

use App\ToDo\Infrastructure\Web\Controllers\ReadTaskController;
use App\ToDo\Main\Factories\ReadTaskControllerFactory;
use PHPUnit\Framework\TestCase;

class ReadTaskControllerFactoryTest extends TestCase
{
    public function testShouldReturnsAReadTaskController()
    {
        $this->assertInstanceOf(ReadTaskController::class, ReadTaskControllerFactory::create());
    }
}
