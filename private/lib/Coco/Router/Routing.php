<?

namespace Coco\Router;

class Routing
{

    private function getParams(string $route, int $params): array
    {
        $route = explode('|', $route);
        $params = explode(',', $route[1]);
        $request = explode('/', REQUEST);
    
        $index = 0; // Index of Params - to set the array key from INT to STRING
        for ($i = count($request) - count($params); $i < count($request); $i++) {
            $paramlist[$params[$index]] = urldecode($request[$i]);
            $index++;
        }

        return $paramlist;
    }

    private function hasParams(string $route): bool
    {
        return count(explode('|', $route)) > 1 ? true : false;
    }

    private function countParams($route)
    {
        $route = explode('|', $route);
        $params = $route[1];
        return $params ? count(explode(',', $params)) : 0;
    }

    private function cleanRoute(string $route): string
    {
        $splitroute = explode('|', $route);
        return $splitroute[0];
    }
    private function countCleanRoute(string $route): int
    {
        return count(explode('/', $this->cleanRoute($route)));
    }

    private function countRequest()
    {
        return count(explode('/', REQUEST));
    }

    private function cleanRequest(int $params, int $countReq): string
    {
        $req = explode('/', REQUEST);
        $dif = $countReq - $params;
        $cr = '';
        for ($i = 0; $i < $dif; $i++) {
            $cr .= $req[$i] . '/';
        }
        return rtrim($cr, '/');
    }


    public function run($type = 'main_pages')
    {
        $pages = \Coco\Data::getJSON($type); // Laden der Seiten 

        $countRequest = $this->countRequest();

        $selected_page = array();
        $selected_page_params = array();
        $selected_page_params_count = 0;
        $selected_page_is_callable = false;

        foreach ($pages as $page) {

            $route = $page->route;
            $hasParams = $this->hasParams($route);
            $cleanRoute = $this->cleanRoute($route);
            $countParams = $this->countParams($route);
            $countCleanRoute = $this->countCleanRoute($route);
            $cleanRequest = $this->cleanRequest($countParams, $countRequest);


            $isMatch = $cleanRoute === $cleanRequest ? true : false;
            $isSame = ($countRequest === ($countCleanRoute + $countParams)) ? true : false;

            if ($isSame && $isMatch) {
                // Route with Params
                $selected_page_params = $this->getParams($route, $countParams);
                $selected_page = $page;
                $selected_page_is_callable = true;
                $selected_page_params_count = $this->countParams($route);
                break;
            }

            if ($route === REQUEST) {
                // Route without Params
                $selected_page = $page;
                $selected_page_is_callable = true;
                $selected_page_params_count = $this->countParams($route);

                break;
            }
        }

        $output = array();

        if($selected_page_is_callable){
            // echo '<h2>PAGE Info</h2>';
            $has_params = $selected_page_params_count > 0? true: false;

            $output["page"] = $selected_page;
            $output["status"] =  200;

            // echo '<pre>' . var_export($selected_page, true) . '</pre>';
            if($has_params){
                // echo '<h3>PAGE PARAMS</h3>'; 
                // echo '<pre>' . var_export($selected_page_params, true) . '</pre>';
                $output["params"] = $selected_page_params;

            }

        } else {
            $output["status"] =  404;
        // \Coco\Pages::error404();
        }

        return $output;

    }
}
