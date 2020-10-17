<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Academic;
use App\TeacherStudentComment;
use DB;


class manageStudentsController extends Controller
{
    //
    public function addStudent(Request $request){
    	$firstname = $request->firstname;
    	$lastname = $request->lastname;
    	$email = $request->email;
    	$address = $request->address;
    	$class = $request->class;
    	$course = $request->course;
    	$active = 0;

    	// if($request->hasFile('image')){
      $uploadFile = $request->file('image');
      $filename = time().$uploadFile->getClientOriginalName();
      $modifiedFilepath = 'student-avatars/'.$filename;

      Storage::disk('local')->putFileAs(
          'public/student-avatars',
          $uploadFile,
          $filename
        );

      
        // }

        $data = ['first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email,'avatar'=>$modifiedFilepath,'address'=>$address,'class'=>$class,'course'=>$course,'start_date'=>now(),'active'=>$active];

        Student::insert($data);

        return redirect('/addstudents')->with('status', 'Student Added Successfully!');
    }

    
    public function viewStudent(Request $request){
      $studentid = $request->studentid;

      $data['student'] = Student::where('students.id',$studentid)
                          ->leftJoin('teacher_student_comments','students.id','student_id')
                          ->select('*','students.id as studentid')
                          ->first();

      $data['comment'] = TeacherStudentComment::where('student_id',$studentid)
                          ->get();

      $data['favoriteSubject'] = Academic::select(DB::raw('SUM(exam_score) as top_score'),'subject_name')
                          ->join('subjects','subjects.id','academics.subject_id')
                          ->where('academics.student_id',$studentid)
                          ->groupBy('subject_name')
                          ->orderBy('top_score','DESC')
                          ->first();

      return view('dashboard.profile')->with('data',$data);
    }

    public function editStudentInformation(Request $request){
      $studentid = $request->studentid;
      $staffid = Auth::user()->id;

      $data['student'] = Student::where('students.id',$studentid)
                          ->leftJoin('teacher_student_comments','students.id','student_id')
                          ->select('*','students.id as studentid')
                          ->first();

      $data['comment'] = TeacherStudentComment::where([['student_id',$studentid],['staff_id',$staffid]])
                          ->first();

      $data['favoriteSubject'] = Academic::select(DB::raw('SUM(exam_score) as top_score'),'subject_name')
                          ->join('subjects','subjects.id','academics.subject_id')
                          ->where('academics.student_id',$studentid)
                          ->groupBy('subject_name')
                          ->orderBy('top_score','DESC')
                          ->first();

      return view('dashboard.editStudentProfile')->with('data',$data);
    }

    public function saveStudentInformation(Request $request){
      $email = $request->email;
      $firstname = $request->firstname;
      $lastname = $request->lastname;
      $address = $request->address;
      $city = $request->city;
      $country = $request->country;
      $description = $request->description;
      $comment = $request->comment;
      $course = $request->course;

      $studentid = $request->studentid;
      $staffid = Auth::user()->id;

      $data=["first_name"=>$firstname,"last_name"=>$lastname,"address"=>$address,"city"=>$city,"country"=>$country,"description"=>$description];

      Student::where('id',$studentid)->update($data);

      $data2=["student_id"=>$studentid,"comment"=>$comment,"staff_id"=>$staffid];

      if(TeacherStudentComment::where([['student_id',$studentid],['staff_id',$staffid]])->exists()){
          TeacherStudentComment::where('student_id',$studentid)->update($data2);
      } else {
          TeacherStudentComment::insert($data2);
      }
      

      return redirect()->route('viewstudent',['studentid'=>$studentid]);
    }
}
