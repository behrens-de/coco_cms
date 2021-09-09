<?

namespace Coco;

class Pages
{

    private function url(string $url) : string{
        switch ($url) {
            case 'home':
                return DOMAIN.PREFIX; // Retirns the main/home Page
                break;
            
            default:
                # code...
                break;
        }
    }

    public static function error404()
    {
        header("HTTP/1.0 404 Not Found");
        $self = new self();
        $error_code = http_response_code();
        $request = DOMAIN.REQUEST;
        $domain = $self->url('home');
        print "<h1>ERROR  $error_code </h1>
        <p>$request</p>
        <a href='$domain'>zurück zur startseite</a>
        ";
        die();
    }
}
