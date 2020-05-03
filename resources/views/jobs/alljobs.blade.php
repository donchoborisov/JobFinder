@extends('layouts.main')
@section('content')


<div class="container">
    <div class="row">
      <form action="{{route('alljobs')}}" method="GET">
      <div class="form-inline">


          <div class="input-group input-group-sm ">
           <label>Keyword  &nbsp;</label>
           <input type="text" name="title" class="form-control " >
          </div>
&nbsp;&nbsp;
           <div class="input-group input-group-sm ">
           <label>Employment type  &nbsp;</label>
           <select class="form-control" name="type">
            <option value="">-select-</option>
            <option value="fulltime">fulltime</option>
            <option value="partime">partime</option>
            <option value="casual">casual</option>
           </select>

          </div>
       &nbsp;&nbsp;
            <div class="input-group input-group-sm ">
           <label>Category  &nbsp;</label>
           <select name="category_id" class="form-control">
            <option value="">-select-</option>
           @foreach(App\Category::all() as $cat)

           <option value="{{$cat->id}}">{{$cat->name}}</option>
           @endforeach
           </select>
       
          </div>
       &nbsp;&nbsp;
             <div class="input-group input-group-sm ">
           <label>Address</label>  &nbsp;&nbsp;
           <input type="text" name="address" class="form-control " >&nbsp;
          </div>
              

            <div class="input-group-btn">
             <button type="submit" class="btn-sm btn-outline-success">Search</button>
          </div>

          </div>  
          </form> 


          <div class="col-md-12">
     
         <div class="rounded border jobs-wrap">
              @if(count($jobs)>0)
               @foreach($jobs as $job)

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{$job->company->cname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                      &nbsp;&nbsp;<div><span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='fulltime')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                   </div>
                   @elseif($job->type=='partime')
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-danger">{{$job->type}}</span>
                   </div>
                   @else
                    <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                   </div>
                   @endif
                </div>  
              </a>

              
            @endforeach
            @else
            No job(s) found
            @endif


            </div>
          </div>
    {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>


</div>


@endsection
  




