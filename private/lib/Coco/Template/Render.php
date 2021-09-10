<?

namespace Coco\Template;

class Render
{
    private $tplFolder = __DIR__ . "/../../../../public/tpl/";
    private $tplPartFolder = "parts";
    private $tplExtension = ".html";

    public function run($arg)
    {
        $tplName =  $arg["page"]->template . $this->tplExtension;
        $template = $this->load($tplName);
        return $this->rendering($template);
    }




    public function rendering(string $page): string
    {
        preg_match_all('/\{{(.*?)\}}/', $page, $matches, PREG_PATTERN_ORDER);

        $match1 = $matches[1];

        foreach ($match1 as $match) {
            $pos = strpos($match, '|');

            if ($pos) {
                ### echo $match . ') beinhaltet ein | ---'.'<br>';
                $exp = explode('|', $match);

                switch (strtolower($exp[0])) {
                    case 'inc':
                        $page = str_replace("{{" . $exp[0] . "|" . $exp[1] . "}}", $this->inclPart($exp[1]), $page);
                        break;

                    case 'year':
                        $page = str_replace("{{year}}", date("Y"), $page);
                        break;

                    default:
                        $page = str_replace("{{" . $exp[0] . "|" . $exp[1] . "}}", "{{--" . $exp[0] . "|" . $exp[1] . "}}", $page);
                        break;
                }
            } else {
                switch (strtolower($match)) {
                    case 'year':
                        $page = str_replace("{{" . $match . "}}", date("Y"), $page);
                        break;
                    case 'company':
                        $page = str_replace("{{" . $match . "}}", COMPANY, $page);
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
        return $page;
    }

    # Handels the {{inc|page.html}} Variable
    function inclPart(string $file): string
    {
        $tplFolder = $this->tplFolder;
        $tplPartFolder = '/' . $this->tplPartFolder . '/';

        $path = $tplFolder . TEMPLATE . $tplPartFolder . $file;
        if (file_exists($path)) {
            return $this->rendering(file_get_contents($path, true));
        }
        // If file dosen´t exist in 
        return "<pre>INCLUDE ERROR: <b>$file</b> does not exist</pre>";
    }


    # Load the Template
    function load(string $file): string
    {

        $tplname = "coco";
        $path = $this->tplFolder . TEMPLATE . "/$file";
        if (file_exists($path)) {
            return file_get_contents($path, true);
        }
        return "<pre>LOADING ERROR: inside the Template {" . TEMPLATE . "} <b>$file</b> does not exist</pre>";
    }
}
