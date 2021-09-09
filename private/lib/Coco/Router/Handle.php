<?

namespace Coco\Router;

class Handle
{

    function __construct($route)
    {
        $this->route = $route;
    }

    function info()
    {
        return '<pre>' . var_export($this->route, true) . '</pre>';
    }
}
