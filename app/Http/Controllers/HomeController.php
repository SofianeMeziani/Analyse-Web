<?php

namespace App\Http\Controllers;
use Auth;
use App\Favorite;
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
        $array['fav'] = Auth::user()->favorite()->get();
        return view('home',$array);
    }

    public function insert(Request $request)
    {
        $user = Auth::user()->id;
        $name = $request->input('name');
        $link = $request->input('link');
        $data = array('name'=>$name,"link"=>$link,'user_id'=>$user);
        Favorite::insert($data);
        return redirect('/');
    }

    public function del_fav(Request $request)
    {
        $name = $request->input('name');
        Favorite::find($name)->delete();
        return redirect('/');
    }
}
