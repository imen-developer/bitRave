<?php
namespace Refactor;

use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\RequestStack;

use Symfony\Component\Routing;


class Framework extends HttpKernel\HttpKernel
{
    
    // public function __construct($routes)
    // {
    //     $context = new Routing\RequestContext();
    //     $matcher = new Routing\Matcher\UrlMatcher($routes, $context);
    //     $requestStack = new RequestStack();

    //     $controllerResolver = new HttpKernel\Controller\ControllerResolver();
    //     $argumentResolver = new HttpKernel\Controller\ArgumentResolver();

    //     $dispatcher = new EventDispatcher();
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
    //     $listener = new HttpKernel\EventListener\ExceptionListener(
    //         'Controller\ErrorController::exception'
    //     );
    //     $dispatcher->addSubscriber($listener);
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\StreamedResponseListener());
    //     $dispatcher->addSubscriber(new Listener\StringResponseListener());
    //     $dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));

    //     parent::__construct($dispatcher, $controllerResolver, $requestStack, $argumentResolver);
    // }
}