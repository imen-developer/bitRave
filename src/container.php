<?php
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\EventDispatcher;
use Refactor\Framework;

$containerBuilder = new DependencyInjection\ContainerBuilder();
$containerBuilder->setParameter('debug', false);

$containerBuilder->register('context', Routing\RequestContext::class);
$containerBuilder->register('matcher', Routing\Matcher\UrlMatcher::class)
    ->setArguments(array('%routes%', new Reference('context')))
;
$containerBuilder->register('request_stack', HttpFoundation\RequestStack::class);
$containerBuilder->register('request', HttpFoundation\Request::class);
$containerBuilder->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
$containerBuilder->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);

$containerBuilder->register('listener.router', HttpKernel\EventListener\RouterListener::class)
    ->setArguments(array(new Reference('matcher'), new Reference('request_stack')))
;
$containerBuilder->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
    ->setArguments(array('UTF-8'))
;
$containerBuilder->register('listener.exception', HttpKernel\EventListener\ExceptionListener::class)
    ->setArguments(array('Controller\ErrorController::exception'))
;
$containerBuilder->register('dispatcher', EventDispatcher\EventDispatcher::class)
    ->addMethodCall('addSubscriber', array(new Reference('listener.router')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.response')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.exception')))
;
$containerBuilder->register('listener.string_response', Refactor\Listener\StringResponseListener::class);
$containerBuilder->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.string_response')))
;


$containerBuilder->register('framework', Framework::class)
    ->setArguments(array(
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ))
;

return $containerBuilder;