<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Blog\Http\Requests;
use GetStream\Stream\Client;
use Blog\Models\User;
use Blog\Models\Post;
use Blog\Models\Follow;


class HomepageController extends Controller
{
 	public function show($id){
 		
		$users = User::where('id','!=',$id)->get();
		
		$client = new Client('4sfm2rjss47y', 'ymccmrjqrckmq867p2d6xwrgshrdujp4d23n9n7tchcyb8qk92k5pzbvpfs9c7zq');	
		$myFeed = $client->feed('user', $id);
		$follows = Follow::getById($id);
		
		foreach ($follows as $follow){

			$user = User::getById($follow->getFollowsId());
		
			foreach ($user->getPost() as $post){
				$data = array(
  			  	"actor"=>$follow->getFollowsId(),
			    "verb"=>"like",
    			"object"=>$post->getId(),
    		  	"post"=>$post->getArticle()
				);
				$myFeed->addActivity($data);
			}
		}
		
		//dd($myFeed->getActivities()['results']);
		$users = User::where('id','!=',$id)->get();
		
		return view('home',compact('users','id','myFeed'));
 	}
	
	public function follow(Request $request,$myid){
		
		$follow = new Follow;
		$follow->setMyId($myid);
		$follow->setFollowId($request->input('followid'));
		$follow->save();
		
		return $this->show($myid);
	}

}
