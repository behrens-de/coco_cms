<?

namespace Coco\Template;

class Elements
{
    private $assetFolder = __DIR__ . "/../../../../public/tpl/".TEMPLATE."/assets";

     function css(){
        $folder = $this->assetFolder."/css/";
        $files = scandir($folder);
        $domain = DOMAIN.''.PREFIX.'tpl/'.TEMPLATE.'/assets/css/';
        $domain = str_replace("admin/", "", $domain);

        $allfiles = '';
        foreach($files as $file){
            if($file !== '.' && $file !== '..')
            $allfiles .= '<link rel="stylesheet" href="'.$domain.$file.'">';
        }
        return $allfiles;
    }


}