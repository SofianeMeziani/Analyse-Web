<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Analysis;
use App\General;
use Auth;
use Hash;

class UserController extends Controller
{
	public function account ()
	{ 
		$user=Auth::user();
		$array["user"] = $user;
		return view("user", $array);
	}

	public function getAnalysis()
	{
		$allAnalysis = Auth::user()->analysis()->get()->toArray();
		$array = array();
		foreach ($allAnalysis as $analyse) {
			foreach ($analyse as $key => $value) {
				if ($key != "created_at" && $key != "updated_at") {
					$analyse[$key] = json_decode($value, true);
				}
			}
			array_push($array, $analyse);
		}
		$array = array_reverse($array);
		return view("history", ["histories"=>$array]);
	}

	

    public function delAnalysisById(Request $request)
    {
        $name = $request->input('name');
        Analysis::find($name)->delete();
        return redirect('/history')->with(["message"=>"deleted"]);
    }

    public function getAnalysisById(Request $request)
    {
        $name = $request->input('name');
        // $analysis = Analysis::find($name)->toArray();
        // foreach ($analysis as $key => $value) {
        //     if ($key != "created_at" && $key != "updated_at") {
        //         $analysis[$key] = json_decode($value, true);
        //     }
        // }

        $analysis = Analysis::getAnalysisById($name);

        return view("historydetails", $analysis);
    }



	public function updatePersonalInfo(Request $request)
	{
		$data = $request->all();
		$user = User::find($data['user_id']);
		$user->name = $data["name"];
		$user->save();
		
		return redirect('/user')->with(["message"=>"infoupdated"]);

	}

	public function updatePassword(Request $request)
	{
		$data = $request->all();
		$user = User::find($data['user_id']);
		if ($user && Hash::check($data["current"], $user->password) ) {
			$newpass = Hash::make($data["password"]);
			$user->password = $newpass ;
			$user->save();
			return redirect('/user')->with(["message"=>"updated"]);
		} else {
			return redirect('/user')->with(["message"=>"notupdated"]);
		}
	}

}