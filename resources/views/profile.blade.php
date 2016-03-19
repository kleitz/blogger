@extends('header')
@section('header')

<title>Bolgger</title>
<center><h1>Profile</h1>   
     
</center>
    
@stop

@section('content')
        
	  {{ Form::model($user, array('route' => array('update', $user->getId()))) }}

		  {{ Form::label('name', $user->getName()) }}
          <br>
           {{ Form::label('post', 'Post') }}
   <br>
		  {{ Form::textArea('post') }}
          
          {{ Form::submit('Post') }}		  
		  
		  
		  {{ Form::close() }}  
          
          
	
          <br />
          <br />
          <br />
          
          <div> My Posts </div><br />

          @foreach($user->getPost() as $post) 
        <div> <p>
      {{  $post->getArticle()	}}
        </p>
        </div><br>
        @endforeach   
          
<a class="btn btn-default" href="{{ URL::route('home', $user->getId()) }}" }}>Home</a>  

  
@stop

