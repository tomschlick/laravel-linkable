<?php

namespace TomSchlick\Linkable\Tests;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * SetUp.
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/Fakes/migrations/');

        Route::middleware('web')->group(__DIR__ . '/Fakes/routes.php');
    }

    /**
     * @param string $name
     */
    public function assertHasRoute(string $name) : void
    {
        $routes = [];

        /** @var \Illuminate\Routing\Route $route */
        foreach (Route::getRoutes() as $route) {
            $routes[$route->getName()] = $route->getActionMethod();
        }

        $this->assertArrayHasKey($name, $routes);
    }
}
