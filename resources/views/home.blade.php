
@extends('header')
@section('header')

<title>Bolgger</title>
<center><h1>Home</h1>   </center>
    
@stop

@section('content')

   @foreach($users as $user) 

		 {{ Form::model($user, array('route' => array('follow', $id))) }}

		  {{ Form::text('name', $user->getName()) }}
          {{ Form::hidden('followid', $user->getId()) }}
          {{ Form::submit('Follow') }}		  
		  
		  
		  {{ Form::close() }}  
          
          @endforeach
        
       @include('feed')
     

<a class="btn btn-default" href="/">Login</a>       
   

@stop

