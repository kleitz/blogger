<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;
use Blog\Models\User;

class ProfilepageController extends Controller
{
    public function show(){
 		$user = Auth::user();
 		return view('profile',compact('user'));
 	}

 	public function update(Request $request){
 		dd('update');
 	} 

 	public function create(Request $request){
 		$user = new User;
 		
 		$user->setName($request->input('name'));
 		$user->setEmail($request->input('email'));
 		$user->save();

 		return view('profile',compact('user'));

 	}

 	public function login(){
 		return view('create');
 	}    
}
