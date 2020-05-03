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
      <th scope="col">Content</th>
      <th scope="col">Name</th>
      <th scope="col">Profession</th>
      <th scope="col">Video id</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($testimonials as $testimonial)
    <tr>
    
      <td>{{str_limit($testimonial->content,30)}}</td>
      <td>{{$testimonial->name}}</td>
     
      <td>{{$testimonial->profession}}</td>
      

     <td>{{$testimonial->video_id}}</td>
    </tr>
   @endforeach
 
  </tbody>
</table>
{{$testimonials->links()}}
</div>
</div>

</div>


@endsection