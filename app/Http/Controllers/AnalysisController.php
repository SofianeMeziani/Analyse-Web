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

    public function file_get_contents_curl($url) {
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
        return $total_time;

    }

    // public function getLinks($url) {
    //     $data=file_get_contents($url);
    //     $data = strip_tags($data,"<a>");
    //     $d = preg_split("/<\/a>/",$data);

    //     $result = array();
    //     $pageltime = array();
    //     foreach ( $d as $k=>$u ){
    //         if( strpos($u, "<a href=") !== FALSE ){
    //             $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
    //             $u = preg_replace("/\".*/","",$u);
    //             if (!strpos($u, "/")==0){
    //                 array_push($result, $u);
    //             }
    //         }
    //     }
    //     return $result;
    // }

    // echo '<a href="'.$url.'">'.$url.'</a><br />';



        public function getLinks($url) {
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
        // dd(array_unique($urls));
        // dd($urls);
        return $result;
    }

    public function getLinkstime($urls) {
        $result = array();
        foreach ($urls as $value) {
            array_push($result, $this->t_reponse($value));
        }
        return $result;
    }

    /*public function site_links($urls) {
        foreach ($urls as $value) {
            $links=$this->getLinks($value);
        }
        $result = array();

        return $result;
    }*/

    public function site_links($array,$profondeur,$original_link,&$internal_links,&$external_links) {

        //$total_links = 0;
        $profondeur_max = 0;
        $links = array();
        a:
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
            foreach ($array_unique_links as $aLink) {
                if (strpos($aLink, $original_link) === false){
                    $external_links = $external_links + 1;
                } else {
                    $internal_links = $internal_links + 1;
                }
            }
            array_push($array, $array_unique_links);
            if (sizeof($array) <= $profondeur) 
                goto a;
        } else {
            $profondeur_max = sizeof($array); // -1 ?;
        }
        //dd($array);
        return $array;
    }

    public function analyse(Request $request)
    {

        $url = $request->all()["url"];
        $profondeur = $request->all()["Profondeur"];
        $lienx = $request->all()["liensx"];
        $tmoyen = $request->all()["TempsRep"];

        if (false === strpos($url, '://'))  {
            $url = 'http://' . $url;
        }

        if (false === strpos($url, 'www.')) {
            if (false === strpos($url, 'https')) {
                $url = substr($url, 0, 7) . "www." . substr($url, 7);
            } else {
                $url = substr($url, 0, 8) . "www." . substr($url, 8);
            }    
        }

        if (strcmp ( substr($url, strlen($url) - 1) , '/') !== 0)  {
            $url = $url . '/';
        }

        //dd($url);

        $ltime = $this->t_reponse($url);

        // $result = $this->getLinks($url);
        $result = $this->getLinks($url);

        //$pageltime = $this->getLinkstime($result);

        $internal_links = 1;
        $external_links = 0;

        //dd($url);

        // trouver la position du 3 eme slash
        $pos1 = strpos($url, '/');
        $pos2 = strpos($url, '/', $pos1 + 2);

        // http://www.translate.google.com
        $original_link = substr ($url ,0, $pos2);

        // trouver la position du 2 eme point depuis la fin
        $pos1 = strrpos ($original_link, '.');
        $pos2 = strrpos ($original_link, '.', $pos1 - strlen($original_link) - 1);

        // google.com
        $original_link = substr ($original_link , $pos2 + 1);
        //dd($original_link);

        $links_array = array();
        $d=array();
        array_push($d, $url);
        array_push($links_array , $d);
        $links_array = $this->site_links($links_array,$profondeur,$original_link,$internal_links,$external_links);
        // array_push($links_array , $result);
        // array_push($links_array , $result);
        // dd($links_array);

        


        // $website_0 = tableau(1) = $url

        for($i = 1; $i <= $profondeur; $i++){

            // create variable website_i

            // pour j <- 0 jusqu'a taille(website_i-1) faire website_i.add(getLinks(website_i-1(j))) ... et supprimer les doublons

        }

        //$result = array_unique($result);
        for($x = 1; $x < sizeof($result); $x++) {
            
            // echo $result[$x];
            // echo "<br>";
        }

        $var ["urls"] = $links_array;
        $var ["prof"] = $profondeur;
        $var ["tdep"] = $tmoyen;
        $var ["ltime"] = $ltime;
        $var ["internal_links"] = $internal_links;
        $var ["external_links"] = $external_links;
        //$var ["pageltime"] = $pageltime;

        //dd($var);
        return view('dashboard', $var);
    }

    // public function dashboard()
    // {
    //     return view('dashboard');
    // }


}
