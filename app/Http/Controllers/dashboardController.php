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
use App\Academic;
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
    							
    	$classes = Classes::where('active',1)->get();

    	foreach ($classes as $i => $class) {
    		# code...
    		$data['studentPerformance'][$i] = Academic::select(DB::raw('SUM(exam_score) as score_sum'), 'students.id','students.first_name','students.last_name','students.class')
    							->join('students','students.id','academics.student_id')
    							->join('classes','classes.class_name','students.class')
    							->where('classes.id',$class->id)
    							->groupBy('students.id','students.first_name','students.last_name','students.class')
    							->orderBy('score_sum','DESC')
    							->first();

    	}


    	$data['highScoreSubjects'] = Academic::select(DB::raw('SUM(exam_score)/COUNT(student_id) as score_sum'),'subjects.subject_name')
    							->join('subjects','academics.subject_id','subjects.id')
    							->groupBy('subjects.subject_name')
    							->orderBy('score_sum','DESC')
    							->get();

    	

    	$data['message'] = "Student count is ".$data['studentcount'];

    	return view('dashboard.dashboard')->with('data',$data);
    }
}
