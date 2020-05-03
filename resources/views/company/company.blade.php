@extends('layouts.main')
@section('content')
<div class="container">
<h2>Companies</h2>
<div class="row">
	@foreach($companies as $company)
<div class="col-md-3">

	<div class="card" style="width: 18rem;">
  @if(empty($company->logo))

			<img width="100" class="card-img-top" src="{{asset('avatar/man.jpg')}}">

			@else
			<img width="100" class="card-img-top" src="{{asset('uploads/logo')}}/{{$company->logo}}">


			@endif

  <div class="card-body">
    <h5 class="card-title text-center">{{str_limit($company->cname,20)}}</h5>
  
  <center><a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">View company</a></center>
  </div>
</div>

</div>	
@endforeach
{{$companies->links()}}
</div>
</div>
@endsection