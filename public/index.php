<?php

// chargement des dépendances composer
require_once __DIR__.'/../vendor/autoload.php';

$router = new AltoRouter();

// définition du répertoire de travail (la partie de l'URL juste après le nom de domaine)
$basePath = $_SERVER['BASE_URI']; // chemin vers "public" fourni par le fichier .htaccess
$router->setBasePath($basePath);

// correspondance des routes
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => 'MainController'
    ],
    'homepage'
);

$router->map(
    'GET',
    '/creators',
    [
        'method' => 'creators',
        'controller' => 'MainController'
    ],
    'creator-page'
);

$router->map(
    'GET',
    '/type/[i:id]',
    [
        'method' => 'type',
        'controller' => 'CatalogController'
    ],
    'type-page'
);

// la méthode match va vérifier si une route (définit au-dessus) correspond avec la route courante
// si oui, on récupère les infos de la route dans un array
$match = $router->match(); // vaut false si pas de correspondance

if ( $match === false ) {
    header("HTTP/1.0 404 Not Found");
    exit('404 page not found');
}

$methodToUse = $match['target']['method'];
$controllerToUse = $match['target']['controller'];
$controllerToUse = 'Osonic\\Controllers\\' . $controllerToUse;

// on instancie la classe à utiliser
$controller = new $controllerToUse($router);

$controller->$methodToUse($match['params']);