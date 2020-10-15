<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Courses;
use App\Subject;
use App\User;
use App\Student;
use App\ClassSubject;
use App\Test_academic;
use App\Exam_academic;
use DB;


class dashboardController extends Controller
{
    //
    public function dashboard(){
    	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    	$data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    	$data['subjectcount'] = Subject::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    	$data['averagescores'] = Classes::select(DB::raw('AVG(exam_score) as average_score'),'classes.class_name')
    							->leftJoin('students','students.class','=','classes.class_name')
    							->leftJoin('exam_academics','students.id','=','exam_academics.student_id')
    							->groupBy('classes.class_name')
    							->get();

    	

    	$data['message'] = "Student count is ".$data['studentcount'];

    	return view('dashboard.dashboard')->with('data',$data);
    }
}
