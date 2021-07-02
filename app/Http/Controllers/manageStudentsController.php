<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use Spatie\Browsershot\Browsershot;

use App\Student;
use App\Academic;
use App\Courses;
use App\TeacherStudentComment;
use App\EventTypes;
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
      $hobbies = $request->hobbies;
      $medical_history = $request->medicalhistory;
      $guardian_contact = $request->guardian_contact;
      $guardian_email = $request->guardian_email;
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

        $data = ['first_name'=>$firstname,'last_name'=>$lastname,'email'=>$email,'avatar'=>$modifiedFilepath,'address'=>$address,'class'=>$class,'course'=>$course,"hobbies"=>$hobbies,'medical_history'=>$medical_history,'guardian_contact'=>$guardian_contact,'guardian_email'=>$guardian_email,'start_date'=>now(),'active'=>$active];

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

      $data['eventTypes'] = EventTypes::all();

      return view('dashboard.profile')->with('data',$data);
    }

    public function print(Request $request){
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

      $data['eventTypes'] = EventTypes::all();

      return view('dashboard.print')->with('data',$data);
    }

    

    public function printsheet(Request $request){
      $html = $request->thehtml;
      $studentid = $request->studentid;

      $objDateTime = date('Ymdis');
      $file = $objDateTime.".pdf";
      $filep = public_path()."/storage/students/".$file;
      // $objDateTime->format('Ymdis');

      Browsershot::html($html)
        ->noSandbox()
        ->format('a4')
        // ->setIncludePath('$PATH:/tmp')
        ->save($filep);
        // ->pdf();



    // return redirect()->route('print',['studentid'=>$studentid]);
        $headers = [
              'Content-Type' => 'application/pdf',
           ];

        return response()->download($filep, $file, $headers);
    }



    public function editStudentInformation(Request $request){
      $studentid = $request->studentid;
      $staffid = Auth::user()->id;

      $data['courses'] = Courses::where('active','=',1)->get();

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

      $data['eventTypes'] = EventTypes::all();


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
      $hobbies = $request->hobbies;
      $medical_history = $request->medicalhistory;
      $guardian_contact = $request->guardian_contact;
      $guardian_email = $request->guardian_email;

      $studentid = $request->studentid;
      $staffid = Auth::user()->id;

      $data=["first_name"=>$firstname,"last_name"=>$lastname,"address"=>$address,"city"=>$city,"country"=>$country,"description"=>$description,"hobbies"=>$hobbies,"medical_history"=>$medical_history,"guardian_contact"=>$guardian_contact,"guardian_email"=>$guardian_email];

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
