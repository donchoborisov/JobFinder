<?php

namespace App;
use App\Job;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function jobs(){
    return $this->hasMany(Job::class);
}
}
