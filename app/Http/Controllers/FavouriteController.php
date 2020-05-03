<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class FavouriteController extends Controller
{
    public function saveJob($id){
    	$jobId = Job::find($id);
    	$jobId->favorites()->attach(auth()->user()->id);
    	return redirect()->back();
    }

    public function unSaveJob($id){
    	$jobId = Job::find($id);
    	$jobId->favorites()->detach(auth()->user()->id);
    	return redirect()->back();
    }
}