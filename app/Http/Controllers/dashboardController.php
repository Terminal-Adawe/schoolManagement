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
use App\EventTypes;
use App\Events;
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

        $data['eventTypes'] = EventTypes::all();

    	

    	$data['message'] = "Student count is ".$data['studentcount'];

    	return view('dashboard.dashboard')->with('data',$data);
    }



    public function saveEvent(Request $request){
        $event = $request->event;
        $from = $request->from;
        $to = $request->to;
        $type = $request->type;

        if($to > $from)
        {

        $diff = abs(strtotime($from) - strtotime($to));

        $years = floor($diff / (365*60*60*24));

        $months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  

        $days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 

        
            for ($i=0; $i < $days; $i++) { 
            # code...
            $data = ['event'=>$event,'event_type_id'=>$type,'event_date'=>$from];

            // $from->modify('+1 day');
            $from = date('Y-m-d H:i:s', strtotime($from . ' +1 day'));

            Events::insert($data);
        }
        }
        if($from == $to){
            $data = ['event'=>$event,'event_type_id'=>$type,'event_date'=>$from];

            Events::insert($data);
        }
        

    }

    public function getEvents(Request $request){
        $data['events'] = Events::join('event_types','event_types.id','events.event_type_id')
                ->select('events.event as eventName','event_type as calendar','indicating_color as color','event_date as date')
                ->get();

        return $data;
    }
}
