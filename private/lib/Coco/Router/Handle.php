<?

namespace Coco\Router;

class Handle
{

    function __construct($route)
    {
        $this->route = $route;
    }

    public function info(): string
    {
        return '<pre>' . var_export($this->route, true) . '</pre>';
    }

    public function getRoute()
    {
        $data = $this->route;
        $template = $data["page"]->template ?? 'default';
        echo $template;
        include __DIR__.'/../../../../public/tpl/coco/'.$template.'.html';
    }

  
}
