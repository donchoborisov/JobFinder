@extends('layouts.main')
@section('content')


<div class="container">
  <h2>{{$categoryName->name}}</h2>
    <div class="row">
     



     
        <table class="table">
       <thead>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
       </thead>
       <tbody>
        @foreach($jobs as $job)
        <tr>
            <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80"></td>
            <td>Position:{{$job->position}}
             <br>
             <i class="fa fa-clock-o" aria-hidden="true">
              </i>&nbsp;Fulltime  


            </td>
            <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Adress:{{$job->address}}</td>
            <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
            <td>
             <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                <button class="btn btn-success btn-sm">Apply</button>
             </a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
    {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>


</div>


@endsection
<style>
    .fa{
        color:#4183D7;
    }

 </style>   




