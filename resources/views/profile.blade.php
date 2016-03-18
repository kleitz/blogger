
@extends('app')
@section('header')

<title>Bolgger</title>
<center><h1>Profile</h1>   
<a class="btn btn-default" href="/">Home</a>       
</center>
    
@stop

@section('content')
		 
		  {{ Form::model($user, array('route' => array('update', $user->id))) }}

		  {{ Form::label('name', $user->getName()) }}

		  {{ Form::text('post') }}
		  
		  {{ Form::close() }}

		  @foreach($user->post as $post)
				
		<div>	<p>	 {{ $post->getArticle()) }}	  </p></div><br><br>
			@endforeach


<a class="btn btn-default" href="/newuser">New User</a>       

@stop

