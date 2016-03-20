 
@yield('feed')
 <div> My Feed </div><br />
        


          @foreach($myFeed->getActivities()['results'] as $post) 
        <div> <p>
      		{{  $post['post']	}}
        </p>
        </div><br>
        @endforeach  