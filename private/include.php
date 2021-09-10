<?
$settings = new \Coco\Setting();

// Laden von JSON files und diese in Arrays umwandeln
$data["setting"] = \Coco\Data::getJSON('settings'); // Einstellungen
$lang = \Coco\Data::getJSON('lang/'.$data["setting"]->lang); // Sprachdatei

// Definieren von Konstanten
define('DOMAIN', $settings->domain()); // Erzeugt die URI OHNE REQUEST 
define('REQUEST', $settings->request(PREFIX)); //-> REQUEST WIRD UM PREFIX GEKÜRZT
define('TEMPLATE', 'coco'); //-> REQUEST WIRD UM PREFIX GEKÜRZT
define('COMPANY', 'COCO CMS'); //-> REQUEST WIRD UM PREFIX GEKÜRZT

// Setzen der Lokalen Zeit
date_default_timezone_set($data["setting"]->timezone);