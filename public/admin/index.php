<?
// ADMIN AREA - Jan Behrens // Coco CMS 2021
session_start(); $SID = session_id();

define('PREFIX', 'public/admin/'); // Wird aus dem Request der URL entfernt
include __DIR__.'/../../private/autoload.php'; // Autoloader für geladen
include __DIR__.'/../../private/include.php'; // Includes werden geladen

use \Coco\Router as CocoRouter;
$routing = new CocoRouter\Routing();
$handleRoute = new CocoRouter\Handle($routing->run('admin_pages'));

echo $handleRoute->info();
echo '<hr>';
$handleRoute->getRoute();


echo '<h1>TEST</h1>';
$test = '
{{hallo}}
Hallo
{{hallo2|test}}
{{INC|header.html}}
';
preg_match_all('/\{{(.*?)\}}/', $test, $matches, PREG_PATTERN_ORDER);

$match1 = $matches[1];

foreach ($match1 as $match) {
    $pos = strpos($match, '|');

    if ($pos) {
        //echo $match . ') beinhaltet ein | ---'.'<br>';

        var_dump(explode('|',$match)); echo '<hr>';


    } else {
        echo $match . ') beinhaltet kein | ---'.'<br>';
    }
}
