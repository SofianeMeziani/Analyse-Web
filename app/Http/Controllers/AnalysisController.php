<?php



namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DOMDocument;

class AnalysisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function file_get_contents_curl($url) 
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function t_reponse ($url)
    {
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $contents = $this->file_get_contents_curl($url);

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        return $total_time * 1000;
    }

    public function check_url($url) 
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
        return $headers['http_code'];
    }

    public function broken_link($url, &$nb_broken, &$nb_broken404)
    {
        $check_url_status = $this->check_url($url);
        if ($check_url_status == '200')
           return "Valide";
        else
        {   
            $nb_broken++;
            if ($check_url_status == '404'){
                $nb_broken404++;
                return "Page introuvable";
            }
            if ($check_url_status == 'bad host'){
                return "Mauvais hôte";
            }
            if ($check_url_status == '302' || $check_url_status == '301'){
                $nb_broken--;
                return "Redirection";
            }
            if ($check_url_status == '400'){
                return "Mauvaise demande";
            }
            if ($check_url_status == 'Malformed URL'){
                return "URL Malformé";
            }
            if ($check_url_status == 'bad code'){
                return "Mauvais code";
            }
            return "Lien mort";
        }
    }

    public function syntaxe_verif($url)
    {
        //require __DIR__.'/AnalyseWebCompilation';
        //dd (getcwd());
        
        chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/app/Http/Controllers/AnalyseWebCompilation");
        file_put_contents("tags.txt", "");

        $htmlcontent =  $this->format_html($url);
        $htmlcontent = str_replace("><", ">\n<", $htmlcontent);
       // $htmlcontent = str_replace("\n\n", "\n<", $htmlcontent);

        file_put_contents("tags.txt",  $htmlcontent);
                
        $result = array();
        $res = shell_exec('./ex1 2>&1');
        

        if (strlen($res) == 3) {
            array_push($result, "CORRECT");
        } else {
            $pos1 = strpos($res, '.');
            $pos2 = strpos($res, '.', $pos1 + 1);
            // balise
            array_push($result, substr ( $res , 0 , $pos1 ));
            // ouverture
            array_push($result, intval( substr ( $res , $pos1 + 1 , $pos2 - $pos1 - 1)));
            // fermeture prevue
            array_push($result, intval( substr ( $res , $pos2 + 1 , strlen($res) - $pos2 )));
        }
        
        return ($result);
    }

    public function getLinks($url) 
    {
        $urlContent = $this->file_get_contents_curl($url);
        $urls = array();
        $dom = new DOMDocument();
        @$dom->loadHTML($urlContent);
        $xpath = new \DOMXPath($dom);
        $hrefs = $xpath->evaluate("/html/body//a");
        for($i = 0; $i < $hrefs->length; $i++){
            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // validate url
            if(!filter_var($url, FILTER_VALIDATE_URL) === false){
                array_push($urls, $url) ;
            }
        }
        $result = array_unique($urls);
        return $result;
    }

    public function getLinkstime($urls) 
    {
        $result = array();
        foreach ($urls as $value) {
            array_push($result, $this->t_reponse($value));
        }
        return $result;
    }

    public function get_original_link ($url) 
    {
        return (parse_url($url)['host']);
    }

    public function site_links($array,$profondeur,$original_link,$lienx,&$internal_links,&$external_links, &$load_time, &$broken_link, &$syntaxe_errors, &$analyse_synt, &$nb_broken, &$nb_broken404) 
    {
        $profondeur_max = 0;
        $links = array();
        while(sizeof($array) <= $profondeur) {
        foreach ($array[sizeof($array)-1] as $value) {
            $links_temp=$this->getLinks($value);
            foreach ($links_temp as $value_temp) {

                // supprimer ce qui suit les pts d'interrogations
                $pos = strpos($value_temp, "?");
                if ($pos !== false) {
                    $value_temp = substr($value_temp, 0, $pos);
                }
                array_push($links, $value_temp);
            }
        }
        if (!empty($links)){ 
            $array_unique_links = array_unique($links);
            foreach ($array_unique_links as $key => $aLink) {
                if (strpos(parse_url($aLink, PHP_URL_HOST), $original_link) === false){
                    if ($lienx == 0) {
                        unset($array_unique_links[$key]);
                    } else {
                       $external_links = $external_links + 1; 
                       array_push($load_time, $this->t_reponse($aLink));
                       array_push($broken_link, $this->broken_link($aLink, $nb_broken, $nb_broken404));
                       if($analyse_synt == 1){
                        array_push($syntaxe_errors, $this->syntaxe_verif($aLink));
                       }
                       
                    }   
                } else {
                    $internal_links = $internal_links + 1;
                    array_push($load_time, $this->t_reponse($aLink));
                    array_push($broken_link, $this->broken_link($aLink, $nb_broken, $nb_broken404));
                    if($analyse_synt == 1){
                        array_push($syntaxe_errors, $this->syntaxe_verif($aLink));
                       }
                }
            }
            array_push($array, $array_unique_links);
            } }
            /*if (sizeof($array) <= $profondeur) 
                goto a;
        } else {
            $profondeur_max = sizeof($array); // -1 ?;
        }*/
        //dd($array);
        return $array;
    }

    

    // supprimer les commentaires conditionnels
    public function format_html($url){

        $html = $this->file_get_contents_curl($url);

        $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
        
        //$pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
        //$html = preg_replace($pattern, '', $html);
        
        $html = str_replace('\r\n', '', $html);

        return ($html);
    }

/*    public function analyse2(Request $request){
        $array = array('abbr', 'a', 'acronym', 'address', 'applet', 'article', 'aside', 'audio', 'b', 'bdi','div', 'bdo', 'big', 'blockquote', 'body', 'button','canvas','caption','center', 'cite', 'code', 'colgroup', 'data', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'dir', 'dl', 'dt', 'em', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'i', 'iframe', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'mark', 'meter', 'nav', 'noframes', 'noscript', 'object', 'ol', 'optgroup', 'option', 'output', 'p', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'section', 'select', 'small', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'svg', 'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'tt', 'u', 'ul', 'var', 'video', 'wbr', 'script');

        foreach ($array as $value) {

            echo "| OUVRANTE_".$value." { inserer(stack, \"".$value."\"); } FERMANTE_".$value." { retirer(stack, \"".$value."\"); }";
            echo "<br>";

        }
        
    }*/

    public function analyse(Request $request)
    {

        $url = $request->all()["url"];
        $profondeur = $request->all()["Profondeur"];
        $lienx = $request->all()["liensx"];
        $analyse_synt = $request->all()["analyse_synt"];
        $tmoyen = $request->all()["TempsRep"];

        if (false === strpos($url, '://'))  {
            $url = 'http:/' .parse_url($url, PHP_URL_HOST).'/'.parse_url($url, PHP_URL_PATH);
        }

        if (strcmp ( substr($url, strlen($url) - 1) , '/') !== 0)  {
            $url = $url . '/';
        }

        //dd($url);

        $nb_broken = 0;
        $nb_broken404 = 0;

        $this->syntaxe_verif($url);

        $load_time = array();
        array_push($load_time, $this->t_reponse($url));

        $broken_link = array();
        array_push($broken_link, $this->broken_link($url, $nb_broken, $nb_broken404));

        $syntaxe_errors = array();
        if($analyse_synt == 1){
            array_push($syntaxe_errors, $this->syntaxe_verif($url));
        }
        


        //$ltime = $this->t_reponse($url);

        // $result = $this->getLinks($url);
        $result = $this->getLinks($url);

        //$pageltime = $this->getLinkstime($result);

        $internal_links = 1;
        $external_links = 0;

        $original_link = $this->get_original_link($url);


        $links_array = array();
        $d=array();
        array_push($d, $url);
        array_push($links_array , $d);
        $links_array = $this->site_links($links_array,$profondeur,$original_link,$lienx,$internal_links,$external_links,$load_time,$broken_link,$syntaxe_errors,$analyse_synt, $nb_broken, $nb_broken404);

        // dd($links_array);
        chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/app/Http/Controllers/AnalyseWebCompilation");
        file_put_contents("tags.txt", "");
        $htmlcontent =  $this->format_html($url);
        $htmlcontent = str_replace("><", ">\n<", $htmlcontent);

        file_put_contents("tags.txt",  $htmlcontent);

       


        $var ["urls"] = $links_array;
        $var ["tmoyen"] = $tmoyen;
        $var ["prof"] = $profondeur;
        $var ["tdep"] = $tmoyen;
        $var ["load_time"] = $load_time;
        $var ["broken_link"] = $broken_link;
        $var ["syntaxe_errors"] = $syntaxe_errors;
        $var ["internal_links"] = $internal_links;
        $var ["external_links"] = $external_links;
        $var ["nb_broken"] = $nb_broken;
        $var ["nb_broken404"] = $nb_broken404;
        $var ["analyse_synt"] = $analyse_synt;
        //$var ["pageltime"] = $pageltime;

        //dd($var);
        return view('dashboard', $var);
    }


}
