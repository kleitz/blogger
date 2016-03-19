<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;
use Blog\Models\User;
use Blog\Models\Post;

class ProfilepageController extends Controller
{

 	public function update(Request $request,$id){
		$user = User::getById($id);
		$post = new Post;
		$post->setArticle($request->input('post'));
		$post->setUser($id);
 		$post->save();
		
		return view('profile',compact('user'));
 	} 

 	public function create(Request $request){
		$user = User::getByEmail($request->input('email'));
		if(count($user)==0 ){
				$user = new User;
 				$user->setName($request->input('name'));
 				$user->setEmail($request->input('email'));
 				$user->save();
				$user = User::getByEmail($request->input('email'));
		}
 		return view('profile',compact('user'));

 	}

 	public function login(){
 		return view('create');
 	}    
}
