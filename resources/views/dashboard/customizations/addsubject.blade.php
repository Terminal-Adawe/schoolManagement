@extends('dashboard.layout.customizations')

@section('morecontent')
<div class="card">
            <div class="card-header">{{ __('Add Subject') }}</div>

                <div class="card-body">
	<form method="POST" action="{{ url('/processAddSubject') }}">
                        @csrf

                        @if (session('status'))
    						<div class="alert alert-success">
        						{{ session('status') }}
    						</div>
						@endif

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>


                            <div class="col-md-6">
                                <select class="form-control" id="course" name="course">
                                @foreach($data['courses'] as $course)
                                   <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subjectname" class="col-md-4 col-form-label text-md-right">{{ __('Subject Name') }}</label>

                            <div class="col-md-6">
                                <input id="subjectname" type="text" class="form-control @error('subjectname') is-invalid @enderror" name="subjectname" value="{{ old('subjectname') }}" required autocomplete="subjectname" autofocus>

                                @error('subjectname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Subject') }}
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
          </div>
@endsection