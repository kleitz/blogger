<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;

class HomepageController extends Controller
{
 	public function show(){
 		$user = Auth::user();
 		return view('home',compact('user'));
 	}
}
