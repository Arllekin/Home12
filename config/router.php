<?php

use Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();
function request() {
    global $request;

    return $request;
}

$dispatcher = new Dispatcher();
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);

function router() {
    global $router;

    return $router;
}

/**
 * Home Page rout.
 *
 */
$router->get('/', [\Hillel\Controllers\HomeController::class, 'home']);


/**
 * Categories rout.
 *
 */
$router->prefix('categories')->group(function($router){
    $router->get('/', [\Hillel\Controllers\CategoryController::class, 'index']);

    $router->match(['get', 'post'], '/create', [\Hillel\Controllers\CategoryController::class, 'form']);
    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\CategoryController::class, 'form']);

    $router->get('/delete/{id}', [\Hillel\Controllers\CategoryController::class, 'delete']);
});

/**
 * Posts rout.
 *
 */
$router->prefix('posts')->group(function ($router) {
    $router->get('/', [\Hillel\Controllers\PostsController::class, 'index']);

    $router->match(['get', 'post'], '/create', [\Hillel\Controllers\PostsController::class, 'create']);

    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\PostsController::class, 'update']);

    $router->get('/delete/{id}', [\Hillel\Controllers\PostsController::class, 'delete']);
});

/**
 * Tags rout.
 *
 */
$router->prefix('tags')->group(function ($router){
    $router->get('/', [\Hillel\Controllers\TagController::class, 'index']);

    $router->match(['get', 'post'],'/create', [\Hillel\Controllers\TagController::class, 'create']);

    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\TagController::class, 'update']);

    $router->get('/delete/{id}', [\Hillel\Controllers\TagController::class, 'delete']);
});
