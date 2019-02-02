<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
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

	public function updatePersonalInfo(Request $request)
	{
		$data = $request->all();
		$user = User::find($data['user_id']);
		$user->name = $data["name"];
		$user->save();
		
		return redirect('./user')->with(["message"=>"infoupdated"]);

	}

	public function updatePassword(Request $request)
	{
		$data = $request->all();
		$user = User::find($data['user_id']);
		if ($user && Hash::check($data["current"], $user->password) ) {
			$newpass = Hash::make($data["password"]);
			$user->password = $newpass ;
			$user->save();
			return redirect('./user')->with(["message"=>"updated"]);
		} else {
			return redirect('./user')->with(["message"=>"notupdated"]);
		}
	}

}