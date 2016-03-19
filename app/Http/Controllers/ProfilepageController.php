<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;
use Blog\Models\User;
use Blog\Models\Post;
use GetStream\Stream\Client;

class ProfilepageController extends Controller
{

 	public function update(Request $request,$id){
		$user = User::getById($id);
		$post = new Post;
		$post->setArticle($request->input('post'));
		$post->setUser($id);
 		$post->save();
		
		$client = new Client('4sfm2rjss47y', 'ymccmrjqrckmq867p2d6xwrgshrdujp4d23n9n7tchcyb8qk92k5pzbvpfs9c7zq');	
		$myFeed = $client->feed('user', $id);
		
		$data = array(
  			  	"actor"=>$id,
			    "verb"=>"own",
    			"object"=>$post->getId(),
    		  	"post"=>$post->getArticle()
				);
		$myFeed->addActivity($data);
		
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
