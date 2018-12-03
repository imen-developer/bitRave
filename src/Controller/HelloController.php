<?php
namespace Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Controller\BaseController; 

class HelloController extends BaseController {

    
    public function index(Request $request){

      $view = $this->renderTemplate('index.php', ['firstname' => 'Fabien']);
      //var_dump($request); die;

      
      return new Response($view);
    
      
      
    }
    public function bitrave(Request $request){
      
      return new Response($this->renderTemplate('bitrave.html.php', ['firstname' => 'Fabien']));
      
    }
}