@extends('dashboard.layout.customizations')

@section('morecontent')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-header">{{ __('Classes') }}</div>

                <div class="card-body">
                    @foreach($data['classes'] as $class)
                    <form action="{{ url('/class-select') }}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="classid" value="{{ $class->id }}">
                        <input type="hidden" name="classname" value="{{ $class->class_name }}">
                        <div class="form-group row">
                            <button class="btn btn-primary btn-block" type="submit" style="color: whitesmoke">{{ $class->class_name }}</button>
                        </div>
                    </form>
                    @endforeach
                </div>
          </div>
    </div>
      <div class="col-lg-6 col-sm-12">
         <div class="card">
            <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
  
                 </div>
          </div>
      </div>
</div>
@endsection