<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Specialty;
use App\Subject;
use App\University;
use App\Profession;

class Subject extends Model
{
    protected $table = 'subject';

     public function specialties()
    {
        return $this->belongsToMany('App\Specialty','specialty_subject','subject_id','specialty_id');
    }

    

   	
}
