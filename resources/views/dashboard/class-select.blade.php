@extends('dashboard.layout.customizations')

@section('morecontent')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="container-fluid">
                <div class="row mt-2 mx-1">
              
                    <a class="fas fa-long-arrow-alt-left fa-2x" href="/mapsubjects"></a> <a href="/mapsubjects" class="mt-1"><span class="mx-2">Back</span></a>

                </div>
              </div>
            <div class="card-header">   
                  {{ __('Classes') }} 
                  <button type="button" class="btn btn-success float-right save-mapping">Save</button>
            </div>

                <div class="card-body">
                  <div class="form-group row">
                    <input type="hidden" class="classid" value="{{ $data['classid'] }}">
                      <button class="btn btn-primary btn-block" type="button" style="color: whitesmoke">{{ $data['classname'] }}</button>
                  </div>
                  <hr>
                  <input type="hidden" class="selSubjs">
                   @foreach($data['subjects'] as $subject)
                      @if($subject->class_id == $data['classid'])
                        <div class="form-group row subjectsFor">
                          <input type="hidden" name="subjectid" class="subjectid" value="{{ $subject->subjectsid }}">
                            <button class="btn btn-primary btn-block subjectsForBtn" type="button" style="color: whitesmoke">{{ $subject->subject_name }}</button>
                        </div>
                      @endif
                    @endforeach
                </div>
          </div>
    </div>
      <div class="col-lg-6 col-sm-12">
         <div class="card">
            <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
                  <input type="hidden" class="deselSubjs">
                  @foreach($data['subjects']->unique('subjectsid') as $subject)
                      @if($subject->class_id != $data['classid'])
                        <div class="form-group row subjectsNotFor">
                            <input type="hidden" name="subjectid" class="subjectid" value="{{ $subject->subjectsid }}">
                            <button class="btn btn-info btn-block subjectsNotForBtn" type="button" style="color: black">{{ $subject->subject_name }}</button>
                        </div>
                      @endif
                    @endforeach
                 </div>
          </div>
      </div>
</div>
@endsection