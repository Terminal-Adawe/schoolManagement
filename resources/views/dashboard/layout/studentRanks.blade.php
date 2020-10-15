@extends('dashboard.layout.layout2')

@section('content')
    <div class="row">
        <div class="col-xl-3">
          <div class="card">
            <div class="card-header">{{ __('Classes') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        
                            <label for="sel1"><strong>Choose Class:</strong></label>
                        
                    </div>
                    @foreach($data['classes'] as $class)
                    <div class="form-group row">
                        <form action="/studentranks" method="get" style="width: 100%">
                            <input type="hidden" name="classid" value="{{ $class->id }}">
                            <input type="hidden" name="term" value="Term_1">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke;" value="{{ $class->id }}">{{ $class->class_name }}</button>
                        </form>
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