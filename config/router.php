<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$router = $router ?? new RouteCollector(
    new \FastRoute\RouteParser\Std(),
    new \FastRoute\DataGenerator\MarkBased()
);

$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});

$router->addRoute("GET", "/", "\Mos\Controller\Index");
$router->addRoute("GET", "/debug", "\Mos\Controller\Debug");
$router->addRoute("GET", "/twig", "\Mos\Controller\TwigView");

$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Mos\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\Mos\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\Mos\Controller\Sample", "where"]);
});

$router->addGroup("/form", function (RouteCollector $router) {
    $router->addRoute("GET", "/view", ["\Mos\Controller\Form", "view"]);
    $router->addRoute("POST", "/process", ["\Mos\Controller\Form", "process"]);
});

$router->addGroup("/dice", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "start"]);
    $router->addRoute("POST", "", ["\Edvin\Controller\DiceController", "gamepost"]);
});

$router->addGroup("/dice1", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "get1"]);
    $router->addRoute("POST", "", ["\Edvin\Controller\DiceController", "getpost"]);
});

$router->addGroup("/dice2", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "get2"]);
    $router->addRoute("POST", "", ["\Edvin\Controller\DiceController", "getpost2"]);
});

$router->addGroup("/stats", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "getstats"]);
    $router->addRoute("POST", "", ["\Edvin\Controller\DiceController", "poststats"]);
});

$router->addGroup("/indexDicegraphic", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "indexDicegraphic"]);
});

$router->addGroup("/yatzywelcome", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\yatzyController", "start"]);
    // $router->addRoute("POST", "", ["\Edvin\Controller\yatzyController", "startpost"]);
});
$router->addGroup("/yatzy", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Edvin\Controller\yatzyController", "startgame"]);
    $router->addRoute("POST", "", ["\Edvin\Controller\yatzyController", "gamepost"]);
});


// $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "dice1"]);
// $router->addRoute("GET", "", ["\Edvin\Controller\DiceController", "dice2"]);


// } else if ($method === "GET" && $path === "/dice") {

//     $callable = new \Edvin\Dice\Game();
//     $callable->playGame();

//     return;
