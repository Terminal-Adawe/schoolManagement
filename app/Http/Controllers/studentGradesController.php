<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Courses;
use App\Classes;
use App\User;
use App\Subject;
use DB;

class studentGradesController extends Controller
{
    //
    public function getGrades(Request $request){
    	$classid = $request->classid;
    	$term = $request->term;
    	$where = [['classes.id','=',$classid],['students.active','=',1],['test_academics.term','=',$term]];

    	$data['students'] = Student::select(DB::raw('SUM(test_score)/COUNT(distinct test_academics.test_name) as total_test_score'), 'students.id as studentid', 'first_name', 'last_name', 'test_academics.term', 'students.class', 'subjects.subject_name', 'subjects.id as subjectid', 'exam_score')
						->join('classes','students.class','=','classes.class_name')
						// ->join('class_subjects','classes.id','=','class_subjects.class_id')
						->leftJoin('test_academics','students.id','=','test_academics.student_id')
						->leftJoin('exam_academics',function($join){
							$join->on('students.id','=','exam_academics.student_id')
								->on('test_academics.subject_id','=','exam_academics.subject_id')
								->on('test_academics.term','=','exam_academics.term');
						})
						->leftJoin('subjects','subjects.id','=','test_academics.subject_id')
						->where($where)
						->groupBy('students.id','last_name','first_name','class','subjects.subject_name','exam_score','test_academics.term','subjects.id')	  
						->get();

		$data['courses'] = Courses::where('active','=',1)->get();
		$data['class'] = Classes::where('id','=',$classid)->first();
		$data['term'] = $term;
		$data['classes'] = Classes::where('active','=',1)->get();
		$data['staff'] = User::where('active','=',1)->get();
		$data['subjects'] = Subject::where('active','=',1)->get();

		$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    	$data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

		return view('dashboard.studentgrades')->with('data',$data);
    }



    public function ranks(Request $request){
    	if(isset($request->classid)){
    		$classid = $request->classid;
    		} else {
    		$classid = 1;
    	}
    		if(isset($request->term)){
    			$term = $request->term;
    		} else {
    			$term = "Term_1";
    		}
    		
    		$where = [['classes.id','=',$classid],['students.active','=',1],['test_academics.term','=',$term]];

    		$data['subjects'] = Subject::where([['active','=',1],['class_subjects.class_id','=',$classid]])
    							->join('class_subjects','class_subjects.subject_id','=','subjects.id')
    							->get();

    		$data['students'] = Student::select(DB::raw('SUM(test_score)/COUNT(distinct test_academics.test_name) * 0.3 + exam_score as score'), 'students.id as studentid', 'first_name', 'last_name', 'test_academics.term', 'students.class')
						->join('classes','students.class','=','classes.class_name')
						// ->join('class_subjects','classes.id','=','class_subjects.class_id')
						->leftJoin('test_academics','students.id','=','test_academics.student_id')
						->leftJoin('exam_academics',function($join){
							$join->on('students.id','=','exam_academics.student_id')
								->on('test_academics.subject_id','=','exam_academics.subject_id');
						})
						->join('subjects','subjects.id','=','test_academics.subject_id')
						->where($where)
						->groupBy('students.id','last_name','first_name','class','test_academics.term','exam_score')	  
						->orderBy('score','DESC')
						->get();
    	

    	$data['classes'] = Classes::where('active','=',1)->get();
    	$data['class'] = Classes::where('id','=',$classid)->first();

    	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    	$data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();
    	
		return view('dashboard.studentRanks')->with('data',$data);
    }
}

// select SUM(test_score)/COUNT(distinct test_name) as total_test_score, students.id as studentid,first_name, last_name, test_academics.term, students.class, students.course, subjects.subject_name, subjects.id as subjectid, exam_score from students left join test_academics on students.id = test_academics.student_id left join exam_academics on exam_academics.student_id = students.id and test_academics.subject_id = exam_academics.subject_id inner join classes on students.class = classes.class_name inner join subjects on subjects.id = test_academics.subject_id group by students.id, first_name, last_name, test_academics.term, students.class, students.course, subjects.subject_name, subjects.id, exam_score 

// select sum(test_score)/COUNT(distinct test_name) as total_test_score, students.id, first_name, last_name, test_academics.term, students.class, students.course, test_academics.subject_id, exam_score from students left join test_academics on students.id = test_academics.student_id left join exam_academics on students.id = exam_academics.student_id and test_academics.subject_id = exam_academics.subject_id inner join classes on students.class = classes.class_name group by students.id, first_name, last_name, test_academics.term, students.class, students.course, test_academics.subject_id, exam_score
