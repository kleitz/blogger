<?php

namespace Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	
	  protected $fillable = array(
        'article'
    );
	
	
	public function user()
    {
        return $this->belongsTo('Blog\Models\User');
    }
	
	
    public function getArticle(){
		return $this->article;
	}
	
	 public function getId(){
		return $this->id;
	}
	
	public function setArticle($article){
		$this->article = $article;
	}
	
	public function setUser($id){
		$this->user_id = $id;
	}
	
	
	
}
