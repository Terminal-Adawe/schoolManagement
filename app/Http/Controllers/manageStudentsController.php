<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Student;


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
}
