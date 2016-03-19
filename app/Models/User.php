<?php

namespace Blog\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = array('name', 'email');

	public function post()
    {
        return $this->hasMany('Blog\Models\Post');
    }
	
    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getName(){
        return $this->name;
    }
	
	 public function getEmail(){
        return $this->email;
    }
	
	public static function getByEmail($email){
		return Self::where('email',$email)->first();	
	}
	
	public static function getById($id){
		return Self::where('id',$id)->firstOrFail();	
	}
	
	 public function getPost(){
        return $this->post;
    }
	

}
