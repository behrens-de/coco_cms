<?
// ADMIN AREA - Jan Behrens // Coco CMS 2021
session_start();
$SID = session_id();

define('PREFIX', 'public/admin/'); // Wird aus dem Request der URL entfernt
include __DIR__ . '/../../private/autoload.php'; // Autoloader für geladen
include __DIR__ . '/../../private/include.php'; // Includes werden geladen

use \Coco\Router as CocoRouter;
use \Coco\Template as CocoTemplate;

$routing = new CocoRouter\Routing();
$handleRoute = new CocoRouter\Handle($routing->run('admin_pages'));
$template = new CocoTemplate\Render();

echo $handleRoute->info() . '<hr>';
#----------#
# Test Template 

$info = $handleRoute->data();
print $template->run($info);
$element = new \Coco\Template\Elements();
$css = $element->css();

print $css;