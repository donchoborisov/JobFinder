@extends('layouts.app')

@section('content')
<div class="container">

      @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @endif
    <div class="row">
      
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>

                <div class="card-body">
                    <h3>Description</h3>
                   <p>{{$job->description}}</p>
                   <p><h3>Duties</h3>{{$job->roles}}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short info</div>

                <div class="card-body">
                    <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"> {{$job->company->cname}}</a></p>
                    <p>Adress:{{$job->address}}</p>
                    <p>Employment type:{{$job->type}}</p>
                    <p>Position:{{$job->position}}</p>
                    <p>Date:{{$job->created_at->diffForHumans()}}</p>
                    <p>Last date to apply:{{date('F d Y',strtotime($job->last_date))}}</p>
                   
                    
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type='seeker')
            @if(!$job->checkApplication())

            <apply-component :jobid={{$job->id}}></apply-component>
       
            @endif
         <br>
     <favourite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}></favourite-component>
            @endif
        </div>


        </div>
    </div>
</div>
@endsection
