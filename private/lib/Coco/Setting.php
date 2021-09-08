<?
namespace Coco;

class Setting{

    function domain()
    {
        return (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'].'/';
    }

    function request($prefix)
    {
        $req  = rtrim(ltrim($_SERVER['REQUEST_URI'],'/'),'/');
        return ltrim(str_replace($prefix, "", $req),'/');
    }
}