@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
        <img src="{{asset('avatar/man.jpg')}}"width="100" style="width:100%;">
        @else 
 <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"style="width:100%;">
        @endif

        <br><br>
  <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
             <div class="card">
            <div class="card-header">Update Company Logo</div>
            <div class="card-body">
               <input type="file" class="form-control" name="company_logo"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
           
            </div>

           </div>
                  @if($errors->has('avatar'))
           <div class="alert alert-danger" style="color:red;" style="font:small;">
            {{$errors->first('avatar')}}
        </div>
            @endif
       </form>




        </div>
        
        <div class="col-md-5">
        <div class="card">
        <div class="card-header">Update Your Company Information</div>

        <form action="{{route('company.store')}}" method="POST">@csrf
        <div class="card-body">
            <div class="form-group">
             <label for="">Address</label>
             <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}" >
              </div>

            <div class="form-group">
             <label for="">Phone number</label>
             <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
        </div>

           <div class="form-group">
             <label for="">Website</label>
             <input type="text" name="website"class="form-control" value="{{Auth::user()->company->website}}">
          

            </div>

            <div class="form-group">
             <label for="">Slogan</label>
            <input type="text" name="slogan"class="form-control" value="{{Auth::user()->company->cname}}">
            </div>

            <div class="form-group">
             <label for="">Description</label>
          <textarea name="description" class="form-control" >
            {{Auth::user()->company->description}}
          </textarea>
            </div>



             <div class="form-group">
             <button class="btn btn-success" type="submit">Update</button>

            </div>




         </div>   




        </div>    
        @if(Session::has('message'))
        <div class="alert alert-success">
         {{Session::get('message')}}
         </div>
        @endif
         
         </div>   
</form>
         <div class="col-md-4">
           <div class="card">
            <div class="card-header">Your Information</div>
            <div class="card-body">
           <p>Company name:{{Auth::user()->company->cname}}</p>
           <p>Company name:{{Auth::user()->company->address}}</p>
           <p>Company name:{{Auth::user()->company->phone}}</p>
           <p>Company name:{{Auth::user()->company->website}}</p>
       <p><a href="company/{{Auth::user()->company->slug}}">View</a></p>




            
            </div>
           </div>
           <br>


<form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
           <div class="card">
            <div class="card-header">Update coverletter</div>
            <div class="card-body">
               <input type="file" class="form-control" name="cover_photo"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
                @if($errors->has('cover_letter'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('cover_letter')}}
            @endif
            </div>
           </div>
   </form>        




         </div>
        
    </div>
</div>
@endsection
