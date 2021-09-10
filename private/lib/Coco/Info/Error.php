<?

namespace Coco\Info;

class Error
{
    static function template(int $code, string $msg) : string{
        $style = " style='color: red; border: 1px dashed red; background: #ffeaea; padding: 20px'";
        return "<pre$style><b>TEMPLATE ERROR: $code,</b><br><br>$msg</pre>";
    }
}