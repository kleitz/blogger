@extends('header')
@section('header')

<title>Bolgger</title>
<center><h1>Profile</h1>   
<a class="btn btn-default" href="/home">Home</a>       
</center>
    
@stop

@section('content')
		 
		  {{ Form::model($user, array('route' => array('update', $user->id))) }}

		  {{ Form::label('name', $user->getName()) }}

		  {{ Form::text('post') }}
		  
		  {{ Form::close() }}      

@stop

