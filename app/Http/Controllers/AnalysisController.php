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

    public function broken_link($url)
    {
        $check_url_status = $this->check_url($url);
        if ($check_url_status == '200')
           $result = "Link Works";
        else
        {
            if ($check_url_status == '404')
                $result = "paga not found";
            if ($check_url_status == 'bad host')
                $result = "bad host";
            if ($check_url_status == '400')
                $result = "bad request";
            if ($check_url_status == 'Malformed URL')
                $result = "Malformed URL";
            if ($check_url_status == 'bad code')
                $result = "bad code";
            else 
                $result = "broken link";
        }
        return $result;
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

    public function site_links($array,$profondeur,$original_link,$lienx,&$internal_links,&$external_links, &$load_time, &$broken_link) 
    {
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
            foreach ($array_unique_links as $key => $aLink) {
                if (strpos($aLink, $original_link) === false){
                    if ($lienx == 0) {
                        unset($array_unique_links[$key]);
                    } else {
                       $external_links = $external_links + 1; 
                       array_push($load_time, $this->t_reponse($aLink));
                       array_push($broken_link, $this->broken_link($aLink));
                    }   
                } else {
                    $internal_links = $internal_links + 1;
                    array_push($load_time, $this->t_reponse($aLink));
                    array_push($broken_link, $this->broken_link($aLink));
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

    public function get_original_link ($url) 
    {
        // trouver la position du 3 eme slash
        $pos1slash = strpos($url, '/');
        $pos2slash = strpos($url, '/', $pos1slash + 2);

        return substr ($url ,0, $pos2slash);

        // trouver la position du 2 eme point depuis la fin
        //$pos1 = strrpos ($original_link, '.');
        //$pos2 = strrpos ($original_link, '.', $pos1 - strlen($original_link) - 1);

        //if ($pos2 === false) 
        //return substr($original_link, $pos1slash + 1);
        //return substr ($original_link , $pos2 + 1);
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

        // a changer
        /*if (false === strpos($url, 'www.')) {
            if (false === strpos($url, 'https')) {
                $url = substr($url, 0, 7) . "www." . substr($url, 7);
            } else {
                $url = substr($url, 0, 8) . "www." . substr($url, 8);
            }    
        }*/

        if (strcmp ( substr($url, strlen($url) - 1) , '/') !== 0)  {
            $url = $url . '/';
        }

        //dd($url);

        $load_time = array();
        array_push($load_time, $this->t_reponse($url));

        $broken_link = array();
        array_push($broken_link, $this->broken_link($url));

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
        $links_array = $this->site_links($links_array,$profondeur,$original_link,$lienx,$internal_links,$external_links,$load_time,$broken_link);

        // dd($links_array);

        $var ["urls"] = $links_array;
        $var ["tmoyen"] = $tmoyen;
        $var ["prof"] = $profondeur;
        $var ["tdep"] = $tmoyen;
        $var ["load_time"] = $load_time;
        $var ["broken_link"] = $broken_link;
        $var ["internal_links"] = $internal_links;
        $var ["external_links"] = $external_links;
        //$var ["pageltime"] = $pageltime;

        //dd($var);
        return view('dashboard', $var);
    }


}
