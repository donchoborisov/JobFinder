@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row" id="app">
          <div class="title" style="margin-top: 20px;">
                <h2></h2> 
          </div>

      @if(empty($company->cover_photo))


   <img src="{{asset('cover/520a34e3500f4_thumb900.jpg')}}" style="width:100%;">

   @else
<img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%;">


   @endif

          <div class="col-lg-12">
            
            
            <div class="p-4 mb-8 bg-white">
              
			        <div class="company-desc">		
			@if(empty($company->logo))

			<img width="100" src="{{asset('avatar/man.jpg')}}">

			@else
			<img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}">


			@endif


            <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp; Website-{{$company->website}}</p>

            </div>

        </div>

        <table class="table">
            
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
                    <td>
                        @if(empty($company->logo))

                    <img width="100" src="{{asset('avatar/man.jpg')}}">

                     @else
                        <img width="100" src="{{asset('uploads/logo')}}/{{$company->logo}}">


                @endif



                    </td>
                    <td>Position:{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">     Apply
                            </button>
                        </a>
                        
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
              
            </div>
          
         
          
            
          </div>

          
          
       



     </div>
   </div>
@endsection
