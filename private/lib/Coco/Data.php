<?
namespace Coco;

class Data{

    static function getJSON($file){
        $path = __DIR__.'/../Data/'.$file.'.json';
        if(file_exists($path)){
            return json_decode(file_get_contents($path, true));
        }
        return false;
    }
}