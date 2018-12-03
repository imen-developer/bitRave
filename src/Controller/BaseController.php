<?php
namespace Controller;

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

class BaseController {

   private $filesystemLoader;

   public function renderTemplate($view, $array){
    
    $filesystemLoader =  new FilesystemLoader('././src/res/templates/%name%');
    
    $templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
    
    return $templating->render($view,$array);
    
    }
}