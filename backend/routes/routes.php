<?php

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->options('/{anything}', function () {
    return '';
});

$route->post('/calls-values', 'SRC\Infrastructure\InputHandler\CallCostInput@calculate');

$route->get('/plans', 'SRC\Infrastructure\InputHandler\Plan@findAll');

$route->get('/areas', 'SRC\Infrastructure\InputHandler\AreaCode@findAll');

$route->on();