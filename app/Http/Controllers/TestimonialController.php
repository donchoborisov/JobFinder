<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
  
   public function index(){
    $testimonials = Testimonial::paginate(10);
    return view('testimonial.index',compact('testimonials'));
   }

   public function create(){
   	return view('testimonial.create');

   }

  public function store(Request $request){

  	$this->validate($request,[
         'content'=>'required|min:40|max:500',
         'name'=>'required',
         'profession'=>'required',
         'video_id'=>'required|integer'

  	]);
  	Testimonial::create([
       'content'=>$request->get('content'),
       'name'=>$request->get('name'),
       'profession'=>$request->get('profession'),
       'video_id'=>$request->get('video_id')
   ]);
  	return redirect()->back()->with('message','Testimonial created successfully');
  }

}
