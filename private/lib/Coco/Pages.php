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
        print "
        <style>
        *{margin: 0;padding: 0;box-sizing: border-box; font-family: arial;color: #424242;}
        body{background: #424242;}
        .box404{width: 100vw; height: 100vh; background: #eee; max-width: 90%; max-height: 80%;  display: flex; flex-direction: column; align-items: center; justify-content: center;  margin: 5% auto; box-shadow: 0 0 25px rgba(0,0,0,.25);border: 5px solid #fff;}
        .box404 p{padding: 30px}
        .box404 a{padding: 18px 36px;  0; font-size: 16px; border-radius: 8px; font-weight: light; background: #424242; color: #eee; text-decoration: none;}
        .box404::after{
            content: 'Coco CMS by JP Behrens';
            font-size: 80%;
            position: absolute;
            bottom: 12%;
            right: 6%;
            opacity: .2;
        }
        </style>
        <div class='box404'><h1>ERROR  $error_code</h1>
        <p>The page you requested (<b>$request</b>) is not available!</p> 
        <a href='$domain'>Click here for homepage</a><div>
        ";
        die();
    }
}
