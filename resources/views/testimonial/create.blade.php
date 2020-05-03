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
        <div class="card-header">

		Post
        </div>
        <div class="card-body">
        	<form action="{{route('testimonial.store')}}" method="Post">@csrf
        	
        		<div class="form-group">
        			<label>Content</label>
        			<textarea name="content" class="form-control  {{$errors->has('content') ? 'is-invalid':''}}">{{ old('content') }}</textarea> 
        				@if($errors->has('content'))
        			<span class="invalid-feedback" role="alert">
        				<strong>{{$errors->first('content')}}</strong>
        			</span>
        			@endif
        		</div>	

                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control  {{$errors->has('name') ? 'is-invalid':''}}"></textarea> 
                        @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                </div>

                   <div class="form-group">
                    <label>Profession</label>
                    <input type="text" name="profession" class="form-control  {{$errors->has('profession') ? 'is-invalid':''}}">
                        @if($errors->has('profession'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('profession')}}</strong>
                    </span>
                    @endif
                </div>  

                    <div class="form-group">
                    <label>Viemo Video id</label>
                    <input type="text" name="video_id" class="form-control  {{$errors->has('video_id') ? 'is-invalid':''}}">
                        @if($errors->has('video_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$errors->first('video_id')}}</strong>
                    </span>
                    @endif
                </div>      	

        		
        	
        		<div class="form-group">
        			<button type="submit" class="btn btn-success">Submit</button>
        		</div>
            </form>
        </div>
     </div>
</div>
</div>
@endsection