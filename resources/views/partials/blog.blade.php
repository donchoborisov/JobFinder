 <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Recent Blog</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">

      
         @foreach ($posts as $post)
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="{{route('post.show',[$post->id,$post->slug])}}" class="image-play">
                  <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-fluid">
                
              </div>
              <h2 class="heading mb-0 h5"><a href="#">{{$post->title}}</a></h2>
              <span class="mb-3 d-block post-date"></a><{{$post->created_at->diffForHumans()}}&bullet; By <a href="#">Admin</a></span>
              <p>{{str_limit($post->content,50)}}</p>
            </div>
             @endforeach
        </div>
        
        <div class="row">
          
        </div>
      </div>
    </div>
    