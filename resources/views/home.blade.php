
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
        
        <div> My Feed </div><br />
        


          @foreach($myFeed->getActivities()['results'] as $post) 
        <div> <p>
      		{{  $post['post']	}}
        </p>
        </div><br>
        @endforeach  

<a class="btn btn-default" href="/">Login</a>       
   

@stop

