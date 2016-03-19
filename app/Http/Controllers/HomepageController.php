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
		$myFeed = $client->feed('flat', $id);
		
		$users = User::where('id','!=',$id)->get();
		
		return view('home',compact('users','id','myFeed'));
 	}
	
	public function follow(Request $request,$myid){
		
		$follow = new Follow;
		$follow->setMyId($myid);
		$follow->setFollowId($request->input('followid'));
		$follow->save();
		
		$client = new Client('4sfm2rjss47y', 'ymccmrjqrckmq867p2d6xwrgshrdujp4d23n9n7tchcyb8qk92k5pzbvpfs9c7zq');	
		$FollowFeed = $client->feed('flat', $myid);
$FollowFeed->followFeed('user', $request->input('followid'));
		
		return $this->show($myid);
	}

}
