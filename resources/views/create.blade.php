@extends('header')
@section('header')

<title>Bolgger</title>
<center><h1>Signup/Signin</h1>          
</center>
    
@stop

@section('content')
		 <center>
		  {{ Form::open(array('route' => array('create'))) }}
		  {{ Form::label('Name')}}
		  {{ Form::text('name') }}
		  {{ Form::label('Email')}}
		  {{ Form::email('email') }}

		  {{ Form::submit('ok') }}		  
		  
		  {{ Form::close() }}
</center>

@stop

