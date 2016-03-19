<?php

namespace Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
   
	public function setMyId($id){
		$this->user_id = $id;
	}
	
	
	public function setFollowId($id){
		$this->follows_id = $id;
	}
	
	public function getFollowsId(){
		return $this->follows_id;
	}
	
	public static function getById($id){
		return Self::where('user_id',$id)->get();
	}
}
