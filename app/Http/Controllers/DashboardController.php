<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Job;

class DashboardController extends Controller
{
    public function index(){

    	$posts = Post::latest()->paginate(20);
    	return view('admin.index',compact('posts'));
    }

      public function create(){
    	return view('admin.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'title'=>'required|min:3',
    		'content'=>'required',
    		'image'=>'required|mimes:jpeg,jpg,png'
         ]);
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$path = $file->store('uploads','public');
    		Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug($title),
                'content'=>$request->get('content'),
                'image'=>$path,
                'status'=>$request->get('status')

    		]);
    	}
    	return redirect('/dashboard')->with('message','Post created succesfully');
    }

    public function destroy (Request $request){
    	$id = $request->get('id');
    	$post = Post::find($id);
    	$post->delete();
    	return redirect()->back()->with('message','Post deleted succesfully');
    }

    public function edit($id){
          $post = Post::find($id);
          return view('admin.edit',compact('post'));
    }

    public function update($id,Request $request){
    	$this->validate($request,[
    		'title'=>'required|min:3',
    		'content'=>'required'
    	]);
    	if($request->hasFile('image')){
   			$file = $request->file('image');
   			$path = $file->store('uploads','public');
   			Post::where('id',$id)->update([
   				'title'=>$title=$request->get('title'),
   				'content'=>$request->get('content'),
   				'image'=>$path,
   				'status'=>$request->get('status')
   			]);
   		}
   		        $this->updateAllExceptImage($request,$id);
   		        return redirect()->back()->with('message','Post updated succesfully');
   		}

   		public function updateAllExceptImage(Request $request,$id){
   			return Post::where('id',$id)->update([
              'title'=>$title=$request->get('title'),
              'content'=>$request->get('content'),
              'status'=>$request->get('status'),


   			]);
   		}

   		public function trash(){
   			$posts = Post::onlyTrashed()->paginate(20);
   			return view('admin.trash',compact('posts')); 
   		}

   		public function restore($id){
   			Post::onlyTrashed()->where('id',$id)->restore();
   			return redirect()->back()->with('message','Post restored succesfully');
   		}

   		public function toggle($id){
   			$post = Post::find($id);
   			$post->status = !$post->status;
   			$post->save();
   			return redirect()->back()->with('message','Status updated succesfully');
   		}

      public function show($id){
        $post  = Post::find($id);
        return view('admin.read',compact('post'));
      }

      public function getAllJobs(){
        $jobs = Job::latest()->paginate(50);
        return view('admin.job',compact('jobs'));
      }

      public function changeJobStatus($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');
      }

}
