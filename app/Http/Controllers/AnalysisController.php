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
            //$pageltime = $this->t_reponse($u);
        }

        return $result;
    }

    public function analyse(Request $request)
    {
        $url = $request->all()["url"];
        $profondeur = $request->all()["Profondeur"];
        $lienx = $request->all()["liensx"];
        $tmoyen = $request->all()["TempsRep"];

        if (strpos($url, "http")==0) {
            $url = "http://" . $url;
        }

        $ltime = $this->t_reponse($url);

        
        
        $result = $this->getLinks($url);

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

        // dd($var);
        return view('dashboard', $var);
    }

    // public function dashboard()
    // {
    //     return view('dashboard');
    // }

}
