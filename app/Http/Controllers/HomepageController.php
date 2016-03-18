<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;

class HomepageController extends Controller
{
 	public function show(){
 		dd('home page show');
 	}
}
