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

    public function analyse(Request $request)
    {
        $url = $request->all()["url"];

        if (strpos($url, "http")==0) {
            $url = "http://" . $url;
        }

        $t0 = round(microtime(true) * 1000);
        $contents = file_get_contents($url);
        $t1 = round(microtime(true) * 1000);
        
        dd($t1 - $t0);
        
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
