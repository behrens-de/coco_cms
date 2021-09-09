<?

namespace Coco;

class Setting
{

    function domain()
    {
        return (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . '/';
    }

    function request($prefix)
    {
        // Removes unnecessary slashes and makes all letters small
        $req  = rtrim(ltrim(mb_strtolower($_SERVER['REQUEST_URI'], 'UTF-8'), '/'), '/');
        $req = str_replace($prefix, "", $req);
        return  trim($req, '/');
    }
}
