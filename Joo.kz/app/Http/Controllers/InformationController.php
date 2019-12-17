<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Subject;
use App\University;
use App\Profession;
use DB;

class InformationController extends Controller
{
  

    public function getProfessions(Request $request)
    {

    	$subject = $this->getSubject($request);
    	
    	$specialties = $this->getSpecialties($subject);
    	
    	$list = [];
    	foreach ($specialties as $specialty) {
    		$professions = $specialty->professions->pluck('pro_name');
    		foreach($professions as $value) 
    		{
    			array_push($list, $value);
    		}
    		
    	}
    	
    	return array_unique($list);
    	

    }

    public function getSubject(Request $request)
    {
    	$first_subject = $request->first_subject;
    	$second_subject = $request->second_subject;
    	$subject = Subject::where('first_subject',$first_subject)->where('second_subject',$second_subject)->first();
    	return $subject;
    }

    public function getSpecialties($subject)
    {
    	return $subject->specialties;
    }

    public function getUniversities(Request $request)
    {
    			
    			$profession = Profession::where('pro_name',$request->profession)->first();
    				$universities = $this->createNeededFormat($profession);
    				$temp = [
    						'name'=>$profession->pro_name,
    						'universities'=>$universities,
    						];
    	return $temp;
    }

    public function createNeededFormat($profession)
    {
    	
    	$specialties = $profession->specialties;
    
    	$universities_list = [];
    	foreach ($specialties as $specialty) {
    		$universities = $specialty->universities;
    		foreach ($universities as $university) {
    			$check = 0;
    			foreach ($universities_list as $key=>$uni) {

    				if($uni['name'] == $university->uni_name)
    				{
    					
    					array_push($universities_list[$key]['spec'],$specialty->spe_name);
    					$check = 1;
    					break;
    				}
    			}
    			if($check == 0)
    			{
    				$temp = [
    					'id'=> $university->id,
    					'name' => $university->uni_name,
    					'spec'=>[$specialty->spe_name],
    				];
    				array_push($universities_list, $temp);
    				
    			}
    		}
    	}
    	#dd($universities_list);
    	return $universities_list;
    }


}
