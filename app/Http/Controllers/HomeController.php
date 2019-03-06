<?php

namespace App\Http\Controllers;
use Auth;
use DB;

use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $fav = DB::table('favorite')->where('user_id', '=', Auth::user()->id)->get();
        $array['fav'] = $fav;
        return view('home',$array);
    }

    public function insert(Request $request)
    {
        $user = Auth::user()->id;
        $name = $request->input('name');
        $link = $request->input('link');
        $data = array('name'=>$name,"link"=>$link,'user_id'=>$user);
        DB::table('favorite')->insert($data);
        return redirect('./');
    }

    public function del_fav(Request $request)
    {
        $name = $request->input('name');
        DB::table('favorite')->where('id','=',$name)->delete();
        return redirect('./');
    }
}
