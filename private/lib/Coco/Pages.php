<?

namespace Coco;

class Pages
{

    public function indexRoutes()
    {
        $pages = \Coco\Data::getJSON('pages'); // Sprachdatei



        foreach ($pages as $page) {
            if ($page->route === REQUEST) {
                $route = $page->route;
                $label = $page->label;
                $status = $page->status;
                $template = $page->template;
            }
        }


        if($status !== 1){
            $this->error404();
        }

        echo 'Status: ' . ($status ?? 0) . '<br>';
        echo 'Route: ' . ($route ?? 'no Route') . '<br>';
        echo 'Lable: ' . ($label ?? 'no Label') . '<br>';
        echo 'Template: ' . ($template ?? 'default.php')  . '<br>';

        echo '<hr>';
    }

    static function error404()
    {
        header("HTTP/1.0 404 Not Found");
        print '<h1>ERROR '.http_response_code().'</h1>';
        die();
    }
}
