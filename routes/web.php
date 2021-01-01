<?php

use Illuminate\Support\Facades\Route;
use App\Courses;
use App\Classes;
use App\Subject;
use App\User;
use App\Student;
use App\Test_academic;
use App\Exam_academic;
use App\classSubject;
use App\EventTypes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'dashboardController@dashboard')->name('home')->middleware('auth');

Auth::routes();

Route::get('/documentation',function(){
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['courses'] = Courses::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['subjectcount'] = Subject::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.docs.documentation')->with('data',$data);
});

Route::post('/action','adminController@action')->middleware('auth');

Route::post('/savemapping','adminController@savemapping')->middleware('auth');

Route::post('/saveTestScores','adminController@savetestscores')->middleware('auth');

Route::post('/saveExamScores','adminController@saveexamscores')->middleware('auth');

Route::post('/saveEvent','dashboardController@saveEvent')->middleware('auth');

Route::post('/getEvents','dashboardController@getEvents')->middleware('auth');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registerstaff', function(){
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['courses'] = Courses::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['subjectcount'] = Subject::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

	return view('dashboard.register')->with('data',$data);
})->middleware('auth');

Route::get('/addstudents', function(){
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['courses'] = Courses::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['subjectcount'] = Subject::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.addstudents')->with('data',$data);
})->middleware('auth');

Route::get('/addclass', function(){
	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.customizations.addclass')->with('data',$data);
})->middleware('auth');

Route::get('/addcourse', function(){
	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.customizations.addcourse')->with('data',$data);
})->middleware('auth');

Route::get('/addsubject', function(){
	$data['courses'] = Courses::all();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.customizations.addsubject')->with('data',$data);
})->middleware('auth');

Route::get('/mapsubjects', function(){

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	$data['classes'] = Classes::where('active','=',1)
						->get();

	return view('dashboard.customizations.mapsubjects')->with('data',$data);
})->middleware('auth');

Route::get('/student-grades', 'studentGradesController@getGrades')->middleware('auth');

Route::get('/studentgrades', function(){
	$data['classes'] = Classes::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.addGrades')->with('data',$data);
})->middleware('auth');

Route::get('/studentranks', 'studentGradesController@ranks')->middleware('auth');

Route::get('/approvals', function(){
	return redirect('/approveaddclass');
})->middleware('auth');

Route::get('/approveaddclass', function(){
	$data['classes'] = Classes::where('active','=',0)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.approvals.approveaddclass')->with('data',$data);
})->middleware('auth');

Route::get('/approveaddcourse', function(){
	$data['courses'] = Courses::where('active','=',0)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

	return view('dashboard.approvals.approveaddcourse')->with('data',$data);
})->middleware('auth');

Route::get('/approveaddsubject', function(){
	$data['subjects'] = Subject::where('subjects.active','=',0)
						->join('courses','subjects.course_id','=','courses.id')
						->select('*','subjects.id as subject_id','subjects.active as subject_active')
						->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.approvals.approveaddsubject')->with('data',$data);
})->middleware('auth');

Route::get('/approveaddstaff',function(){
	$data['staff'] = User::where('active','=',0)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

	return view('dashboard.approvals.approveaddstaff')->with('data',$data);
})->middleware('auth');

Route::get('/approveaddstudents',function(){
	$data['students'] = Student::where('active','=',0)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.approvals.approveaddstudents')->with('data',$data);
})->middleware('auth');

Route::get('/staff', function(){
	$data['students'] = Student::where('active','=',1)->get();
	$data['courses'] = Courses::where('active','=',1)->get();
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['staff'] = User::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.staff')->with('data',$data);
})->middleware('auth');

Route::get('/students', function(){
	$data['students'] = Student::where('active','=',1)->get();
	$data['courses'] = Courses::where('active','=',1)->get();
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['staff'] = User::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['eventTypes'] = EventTypes::all();

	return view('dashboard.students')->with('data',$data);
})->middleware('auth');

Route::get('/addtestscore',function(){
	$data['subjects'] = Subject::where('active','=',1)->get();
	$data['classes'] = Classes::where('active','=',1)->get();
	$data['students'] = Student::where('active','=',1)->get();

	$data['studentcount'] = Student::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

    $data['staffcount'] = User::select(DB::raw('COUNT(id) as count'))
    							->where('active','=',1)
    							->first();

	return view('dashboard.addTestScores')->with('data',$data);
})->middleware('auth');


Route::get('/view-student','manageStudentsController@viewStudent')->name('viewstudent')->middleware('auth');

Route::get('/print','manageStudentsController@print')->name('print')->middleware('auth');

Route::post('/print-sheet','manageStudentsController@printsheet')->name('printsheet')->middleware('auth');

Route::get('/editStudentProfile','manageStudentsController@editStudentInformation')->middleware('auth');

Route::post('/saveStudentInformation','manageStudentsController@saveStudentInformation')->middleware('auth');


Route::get('/class-select','adminController@getSubjects')->middleware('auth');

Route::post('/processAddStudent','manageStudentsController@addStudent')->middleware('auth');

Route::post('/processAddClass','adminController@addClass')->middleware('auth');

Route::post('/processAddCourse','adminController@addCourse')->middleware('auth');

Route::post('/processAddSubject','adminController@addSubject')->middleware('auth');

Route::post('/getStudents','adminController@getStudents')->middleware('auth');

Route::post('/getTestScores','adminController@getTestScores')->middleware('auth');


Route::get('/logout',function (Request $request) {
		
		Auth::logout();

    	return redirect('/login');

	// return view('auth.login')->with('data',$data);
});

	