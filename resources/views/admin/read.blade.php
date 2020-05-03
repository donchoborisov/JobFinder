@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
      @if(Session::has('message'))

      <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
        @if(Session::has('err_message'))

      <div class="alert alert-danger">{{Session::get('err_message')}}</div>
      @endif
      @if(isset($errors)&&count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>

      @endif

       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
                <h2>{{$post->title}}</h2> 

          </div>

      <img src="{{asset('storage/'.$post->image)}}" style="width: 100%;">

          <div class="col-lg-8">
            
            
            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-3">Created By:Admin &nbsp;{{date('d-m-Y',strtotime($post->created_at))}}</h3>
              <p> {{$post->content}}.</p>
              
            </div>
          
          

          </div>









</div>

</div>
</div>
</div>

<script src="{‌{ asset('js/app.js') }}"></script> 
@endsection