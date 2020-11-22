<?php

/* 
* Routers
*/

namespace Core\Routers;

use CoffeeCode\Router\Router;

$router = new Router($_ENV['BASE_URL']);

/**
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$router->namespace("App\Controllers");

/**
 * Routers
 */
$router->group(null);
$router->get("/", "Web:home");
$router->get("/contact", "Web:contact");
$router->get("/about", "Web:about");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}