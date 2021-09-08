<?

namespace Coco;

class Pages
{

    static function error404()
    {
        header("HTTP/1.0 404 Not Found");
        print '<h1>ERROR ' . http_response_code() . '</h1>';
        die();
    }
}
