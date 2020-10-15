@extends('dashboard.layout.layout2')

@section('content')
    <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header">{{ __('Approvals') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approveaddclass" style="color: whitesmoke">Approve Add Class</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approveaddcourse" style="color: whitesmoke">Approve Add Course</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approveaddsubject" style="color: whitesmoke">Approve Add Subject</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approveaddstaff" style="color: whitesmoke">Approve Add Staff</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approvestaffmodification" style="color: whitesmoke">Approve Staff Modification</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approveaddstudents" style="color: whitesmoke">Approve Add Student</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/approvestudentmodification" style="color: whitesmoke">Approve Student Modification</a>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-xl-8">
            @yield('morecontent')
          
                    
                
        </div>
    </div>
@endsection