<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getLinks($url) {
        $data=file_get_contents($url);
        $data = strip_tags($data,"<a>");
        $d = preg_split("/<\/a>/",$data);

        $result = array();
        foreach ( $d as $k=>$u ){
          if( strpos($u, "<a href=") !== FALSE ){
             $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
             $u = preg_replace("/\".*/","",$u);
             array_push($result, $u);
            }
        }

        return $result;
    }

    public function analyse(Request $request)
    {
        $url = $request->all()["url"];

        if (strpos($url, "http")==0) {
            $url = "http://" . $url;
        }

        /*$t0 = round(microtime(true) * 1000);
        $contents = file_get_contents($url);
        $t1 = round(microtime(true) * 1000);
       strip_tags 
        dd($t1 - $t0);*/

        $profondeur = 3;
        
        $result = $this->getLinks($url);

        // $website_0 = tableau(1) = $url

        for($i = 1; $i <= $profondeur; $i++){

            // create variable website_i

            // pour j <- 0 jusqu'a taille(website_i-1) faire website_i.add(getLinks(website_i-1(j))) ... et supprimer les doublons

        }

        //$result = array_unique($result);
        for($x = 0; $x < sizeof($result); $x++) {
            echo $result[$x];
            echo "<br>";
        }

        
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
