<?
function coco_autoloader($class){
    $path = __DIR__.'/lib/';
    $filetyp = '.php';
    $class = str_replace('\\','/',$class);

    if(file_exists($path)){
        require $path.$class.$filetyp;
    }
}
spl_autoload_register('coco_autoloader');