@extends('dashboard.layout.layout2')

@section('content')
    <div class="row">
        <div class="col-xl-3">
          <div class="card">
            <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
                    <div class="form-group">
                                <label for="sel1">Select Class:</label>
                                    <select class="form-control class-selected" id="sel1">
                                        @foreach($data['classes'] as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        
                            <label for="sel1"><strong>Select Subject:</strong></label>
                        
                    </div>
                    @foreach($data['subjects'] as $subject)
                    <div class="form-group row">
                        <button class="btn btn-primary btn-block viewStudents" type="button" style="color: whitesmoke" value="{{ $subject->id }}">{{ $subject->subject_name }}</button>
                    </div>
                    @endforeach
                </div>
          </div>
        </div>

        <div class="col-xl-9">
            @yield('morecontent')
          
                    
                
        </div>
    </div>
@endsection