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

class adminController extends Controller
{
    //
    public function addClass(Request $request){
    	$class = $request->classname;
    	$active = 0;

    	$data = ['class_name'=>$class,'active'=>$active];

    	Classes::insert($data);

    	return redirect('addclass')->with('status', 'Class Added Successfully!');

    }

    public function addCourse(Request $request){
    	$course = $request->coursename;
    	$description = $request->description;
    	$active = 0;

    	$data = ['course_title'=>$course,'description'=>$description,'active'=>$active];

    	Courses::insert($data);

    	return redirect('addcourse')->with('status', 'Course Added Successfully!');

    }

    public function addSubject(Request $request){
    	$subject = $request->subjectname;
    	$courseid = $request->course;
    	$active = 0;

    	$data = ['course_id'=>$courseid,'subject_name'=>$subject,'active'=>$active];

    	Subject::insert($data);

    	return redirect('addsubject')->with('status', 'Subject Added Successfully!');

    }


/*
  TABLE CODES

  1 - Class
  2 - Course
  3 - Subject
  4 - Staff
  5 - Student
*/

    public function action(Request $request){
    	$table = $request->code;
    	$action = $request->action;
    	$record = $request->record;

    	$active = 0;

    	$message = "Nothing yet";
    	$status = "0";

    	if($action == "approve"){
    		$active = 1;
    		$status = "approved";
    	} else if ($action == "reject"){
    		$active = 3;
    		$status = "rejected";
    	}

    	$data=['active'=>$active];

    	if($table=='1'){
    		Classes::where('id','=',$record)->update($data);	
    	} else if($table=='2'){
    		Courses::where('id','=',$record)->update($data);
    	} else if($table=='3'){
    		Subject::where('id','=',$record)->update($data);
    	} else if($table=='4'){
    		User::where('id','=',$record)->update($data);
    	} else if($table=='5'){
    		Student::where('id','=',$record)->update($data);
    	}

    	$message = "Record ".$status;

    	return $message;
    }


    // Save mapping
    public function savemapping(Request $request){
    	$classid = $request->classid;
    	$subjects = $request->subjects;

    	$message="Nothing yet";

    	if($subjects != NULL){
    		ClassSubject::where('class_id','=',$classid)
    					->whereNotIn('subject_id',$subjects)
    					->delete();

    		foreach ($subjects as $i => $subject) {
    			# code...
    			$data =['class_id'=>$classid,'subject_id'=>$subject];

    			$exists = ClassSubject::where($data)->first();

    			if(!$exists){
    				ClassSubject::insert($data);
    			}

    			$message="Data inserted";
    		}
    	} else {
    		$data =['class_id'=>$classid];
    		ClassSubject::where($data)
    					->delete();
    	}
    	



    	return $message;
    }

    public function getSubjects(Request $request){
    	$data['classid'] = $request->classid;
		$data['classname'] = $request->classname;

		$data['subjects'] = Subject::where('active','=',1)
						->select('*','subjects.id as subjectsid')
						->leftjoin('class_subjects','subject_id','=','subjects.id')
						->get();


		return view('dashboard.class-select')->with('data',$data);
    }

    public function getStudents(Request $request){
    	$data['classid'] = $request->classid;
		$data['subjectid'] = $request->subjectid;

		$where=[['students.active','=',1],['class_subjects.subject_id','=',$data['subjectid']],['class_subjects.class_id','=',$data['classid']]];

        $where2 = [['subject_id','=',$data['subjectid']],['classes.id','=',$data['classid']]];

		$data['students'] = Student::where($where)
						->select('*','students.id as student_id')
						->join('classes','students.class','=','classes.class_name')
						->join('class_subjects','classes.id','=','class_subjects.class_id')
						->get();

        $data['tests'] = Test_academic::where($where2)
                            ->join('students','students.id','=','test_academics.student_id')
                            ->join('classes','classes.class_name','=','students.class')
                            ->distinct()
                            ->pluck('test_name');


		return $data;
    }


    public function getTestScores(Request $request){
        $data['classid'] = $request->classid;
        $data['subjectid'] = $request->subjectid;
        $data['testname'] = $request->testname;

        $where=[['students.active','=',1],['class_subjects.subject_id','=',$data['subjectid']],['class_subjects.class_id','=',$data['classid']],['test_academics.test_name','=',$data['testname']]];

        $data['students'] = Test_academic::where($where)
                        ->join('students','test_academics.student_id','=','students.id')
                        ->select('students.id as student_id','test_academics.term','test_name','test_score')
                        ->join('classes','students.class','=','classes.class_name')
                        ->join('class_subjects','classes.id','=','class_subjects.class_id')
                        ->get();


        return $data;
    }


    // Save Test Score
    public function savetestscores(Request $request){
        $subjectid = $request->subjectid;
        $studentscores = $request->studentScores;
        $testtitle = $request->testtitle;
        $term = $request->term;

        $message="Nothing yet how ... ".$subjectid;

        if($subjectid != NULL){
            $testnameexist = Test_academic::where("test_name","=",$testtitle)->first();

            $message="Test Name Already Exists";

            foreach ($studentscores as $i => $studentScore) {
            if(Test_academic::where([["test_name","=",$testtitle],['subject_id','=',$subjectid]])->exists()){
                
                    # code...
                    // echo $studentScore['studentid'];
                    $data =['student_id'=>$studentScore['studentid'],'subject_id'=>$subjectid, 'test_name'=>$testtitle, 'test_score'=>$studentScore['studentscore'],'term'=>$term];

                        Test_academic::insert($data);
                

                    $message="Data inserted";
                
            } else {

                    # code...
                    // echo $studentScore['studentid'];
                    $data =['student_id'=>$studentScore['studentid'],'subject_id'=>$subjectid, 'test_name'=>$testtitle, 'test_score'=>$studentScore['studentscore'],'term'=>$term];

                    $where = [['student_id','=',$studentScore['studentid']],['test_name','=',$testtitle],['subject_id','=',$subjectid]];

                        Test_academic::where($where)->update($data);
                

                    $message="Data updated";
            }

            if(Academic::where([['student_id',$studentScore['studentid']],['term',$term]])->exists()){
                $testSum = Test_academic::select(DB::raw('SUM(test_score) as test_score'),'student_id')
                    ->where([['student_id',$studentScore['studentid']],['term',$term]])
                    ->groupBy('student_id')
                    ->first();

                $data = ['test_score'=>$testSum->test_score];

                Academic::where([['student_id',$studentScore['studentid']],['term',$term]])->update($data);

            } else {
                $testSum = Test_academic::select(DB::raw('SUM(test_score) as test_score'),'student_id')
                    ->where([['student_id',$studentScore['studentid']],['term',$term]])
                    ->groupBy('student_id')
                    ->first();

                if($testSum == NULL){
                    $testSum = 0;
                }

                $data = ['student_id'=>$studentScore['studentid'],'subject_id'=>$subjectid,'term'=>$term,'test_score'=>$testSum->test_score,'exam_score'=>0];

                Academic::insert($data);
            }

            }
        } else {
            // $data =['class_id'=>$classid];
            // ClassSubject::where($data)
            //             ->delete();
        }
        



        return $message;
    }


    // Save Exam Score
    public function saveexamscores(Request $request){
        $studentscores = $request->studentScores;

        $term = $request->term;

        $message="Nothing yet";

                foreach ($studentscores as $i => $studentScore) {
                    # code...
                    // echo $studentScore['studentid'];
                    if($studentScore['studentscore'] == NULL){
                            $studentScore['studentscore'] = 0;
                        }

                    $where = [['student_id','=',$studentScore['studentid']],['subject_id','=',$studentScore['subjectid']],['term','=',$term]];

                    if(Exam_academic::where($where)->exists()){
                        $data =['exam_score'=>$studentScore['studentscore']];

                        Exam_academic::where($where)->update($data);

                        $message="Data updated";
                    } else {

                        $data =['student_id'=>$studentScore['studentid'],'subject_id'=>$studentScore['subjectid'], 'exam_score'=>$studentScore['studentscore'],'term'=>$term];

                        Exam_academic::insert($data);

                        $message="Data inserted";
                    }
                    
                
                if(Academic::where([['student_id',$studentScore['studentid']],['term',$term]])->exists()){

                $data = ['exam_score'=>$studentScore['studentscore']];

                Academic::where('student_id',$studentScore['studentid'])->update($data);

            } else {

                $data = ['student_id'=>$studentScore['studentid'],'subject_id'=>$studentScore['subjectid'],'term'=>$term,'test_score'=>0,'exam_score'=>$studentScore['studentscore']];

                Academic::insert($data);
            }

                    
                }




        return $message;
    }
}
