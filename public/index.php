<?
// PUBLIC AREA - Jan Behrens // Coco CMS 2021
session_start();
$SID = session_id();

define('PREFIX', 'public'); // Wird aus dem Request der URL entfernt
include __DIR__ . '/../private/autoload.php'; // Autoloader für geladen
include __DIR__ . '/../private/include.php';  // Includes werden geladen


//echo DOMAIN.'::'.REQUEST;
//var_dump($pages);
// echo strlen(REQUEST);
// echo REQUEST.'<hr>';
// echo 'RESPONSE CODE: '.http_response_code();

$router = new \Coco\Router(); 
$router->indexRoutes();