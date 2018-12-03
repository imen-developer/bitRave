<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('index', new Routing\Route('/hello/{name}',array(
    'name' => 'World',
    '_controller' => 'Controller\HelloController::index'
)));
$routes->add('bitrave', new Routing\Route('/',[
    '_controller' =>  'Controller\HelloController::bitrave'
]
));

return $routes;