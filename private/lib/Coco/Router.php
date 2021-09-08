<?

namespace Coco;

class Router
{

    private function getParams(string $route, int $params) : array
    {
        $route = explode('|', $route);
        $paramlist = explode(',', $route[1]);

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


    public function indexRoutes()
    {
        $pages = \Coco\Data::getJSON('pages'); // Laden der Seiten 

        $countRequest = $this->countRequest();

        echo '<h3 style="color:green">count Request: ' . $countRequest . '</h3>';


        $stlye = 'style="margin: 0; font-weight: 100;"';

        $route_uri = '';
        $route_has_params = 'No';
        $route_no_of_params = 0;
        $getParams = '';

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

                $route_uri = $cleanRoute;
                $route_has_params = $hasParams ? 'Yes' : 'No';
                $route_no_of_params = $countParams;
                $getParams = $this->getParams($route, $countParams); 
                break;

            } else {

                echo 'Keine route gefunden';
            }
        }
        echo '<h2>PAGE DATA</h2>';
        echo "
        Main Route: <b>$route_uri</b> <br>
        Has Params: <b>$route_has_params</b> (<b>$route_no_of_params</b>)<br>
        Params: <b>$getParams</b>
        ";
        echo '<pre>' . var_export($getParams, true) . '</pre>';

    }
}
