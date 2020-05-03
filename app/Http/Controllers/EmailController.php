<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendJob;
class EmailController extends Controller
{
    public function send(Request $request){
    	$this->validate($request,[
    		'your_name'=>'required|string',
    		'your_email'=>'required||email'

    		'friend_name'=>'required|string',
    		'friend_email'=>'required||email'
          ]);
    	$homeUrl = url('/');
    	$jobId = $request->get('job_id');
    	$jobSlug = $request->get('job_slug');

    	$jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;
    	$data = array(
                'your_name'=>$request->get('your_name'),
                'your_email'=>$request->get('your_email'),
                'friend_name'=>$request->get('friend_name'),
                'jobUrl'=>$jobUrl
            );

    	$emailTo = $request->get('friend_email');
    	try{
    	Mail::to($emailTo)->send(new SendJob($data));
    	return redirect()->back()->with('message','Job sent to '. $emailTo);
}catch(\Exception $e){
 return redirect()->back()->with('error_message','Sorry, Something went wrong.Please try again later ');
}
    	
    }
}
