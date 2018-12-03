<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$container = include __DIR__.'/../src/container.php';

$container->setParameter('routes', include __DIR__.'/../src/res/routings/app_routing.php');

$response = $container->get('framework')->handle($request);

$response->send();


