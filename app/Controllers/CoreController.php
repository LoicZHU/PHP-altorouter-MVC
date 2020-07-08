<?php

namespace Osonic\Controllers;

class CoreController {

    private $router;

    public function __construct($router)
    {
       $this->router = $router; 
    }

    public function show($viewName, $viewVars = array() ) {
        // définition d'URL absolue
        $viewVars['imageAssetsBaseUri'] = $_SERVER['BASE_URI'].'/assets/images/'; 
        
        // extract permet d'utiliser les clés d'un array comme des variables
        extract($viewVars);

        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }

}