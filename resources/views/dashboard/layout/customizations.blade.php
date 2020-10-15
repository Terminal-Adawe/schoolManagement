@extends('dashboard.layout.layout2')

@section('content')
    <div class="row">
        <div class="col-xl-3">
          <div class="card">
            <div class="card-header">{{ __('Customizations') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/addclass" style="color: whitesmoke">Add Class</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/addcourse" style="color: whitesmoke">Add Course</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/addsubject" style="color: whitesmoke">Add Subject</a>
                    </div>
                    <div class="form-group row">
                        <a class="btn btn-primary btn-block" href="/mapsubjects" style="color: whitesmoke">Subject Mappings</a>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-xl-9">
            @yield('morecontent')
          
                    
                
        </div>
    </div>
@endsection