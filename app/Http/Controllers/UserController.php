<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\General;
use Auth;

class UserController extends Controller
{
	public function account ()
	{ 
		return view("user");
	}

}