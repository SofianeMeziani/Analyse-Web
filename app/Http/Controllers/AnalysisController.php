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

    public function t_reponse ($url)
    {

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;

        $contents = file_get_contents($url);

        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        return $total_time;

    }

    public function getLinks($url) {
        $data=file_get_contents($url);
        $data = strip_tags($data,"<a>");
        $d = preg_split("/<\/a>/",$data);

        $result = array();
        $pageltime = array();
        foreach ( $d as $k=>$u ){
            if( strpos($u, "<a href=") !== FALSE ){
                $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
                $u = preg_replace("/\".*/","",$u);
                if (!strpos($u, "/")==0){
                    array_push($result, $u);
                }
            }
        }
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

    public function site_links($array,$profondeur) {
        a:
        foreach ($array[sizeof($array)-1] as $value) {
            $links=$this->getLinks($value);
        }
        if (!empty($links)){ 
            array_push($array, $links);
            if (sizeof($array) <= $profondeur) 
                goto a;
        }
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

       // $ltime = $this->t_reponse($url);

        $result = $this->getLinks($url);

        //$pageltime = $this->getLinkstime($result);

        $links_array = array();
        $d=array();
        array_push($d, $url);
        array_push($links_array , $d);
        $links_array = $this->site_links($links_array,$profondeur);
        // array_push($links_array , $result);
        // array_push($links_array , $result);
        dd($links_array);

        


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

        $var ["urls"] = $result;
        $var ["prof"] = $profondeur;
        $var ["tdep"] = $tmoyen;
        $var ["ltime"] = $ltime;
        $var ["pageltime"] = $pageltime;

        //dd($var);
        return view('dashboard', $var);
    }

    // public function dashboard()
    // {
    //     return view('dashboard');
    // }

}
