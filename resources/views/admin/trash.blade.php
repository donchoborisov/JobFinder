@extends('layouts.app')
@section('content')

<div class="container">
  @if(Session::has('message'))
   <div class="alert alert-success">{{Session::get('message')}}</div>


  @endif
  <div class="row">
    <div class="col-md-4">
      @include('admin.left-menu')
    </div>
<div class="col-md-8">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td><img src="{{asset('storage/'.$post->image)}}"  width="80"> </td>
      <td>{{$post->title}}</td>
      <td>{{str_limit($post->content,20)}}</td>
      <td>@if ($post->status == 0)
                 <a href=""class="badge badge-primary">Draft</a>
          @else
                  <a href="" class="badge badge-success">Live</a>
          @endif        
 
      </td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td> <a href="{{route('post.restore',[$post->id])}}"><button class="btn btn-success">Restore</button></a></td>
    
    </tr>
   @endforeach
 
  </tbody>
</table>
{{$posts->links()}}
</div>
</div>

</div>


@endsection