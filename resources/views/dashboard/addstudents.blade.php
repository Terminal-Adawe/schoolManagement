@extends('dashboard.layout.layout')

@section('content')
	<div class="row justify-content-center">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header">{{ __('Add Students') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/processAddStudent') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('status'))
    						<div class="alert alert-success">
        						{{ session('status') }}
    						</div>
						@endif

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="guardian_contact" class="col-md-4 col-form-label text-md-right">{{ __('Guardian Contact') }}</label>

                            <div class="col-md-6">
                                <input id="guardian_contact" type="text" class="form-control @error('guardian_contact') is-invalid @enderror" name="guardian_contact" value="{{ old('guardian_contact') }}" required autocomplete="guardian_contact" autofocus>

                                @error('guardian_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="guardian_contact" class="col-md-4 col-form-label text-md-right">{{ __('Guardian Email') }}</label>

                            <div class="col-md-6">
                                <input id="guardian_email" type="text" class="form-control @error('guardian_email') is-invalid @enderror" name="guardian_email" value="{{ old('guardian_email') }}" required autocomplete="guardian_email" autofocus>

                                @error('guardian_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>


                            <div class="col-md-6">
                                <select class="form-control" id="class" name="class">
                                    @foreach($data['classes'] as $class)
                                        <option>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>


                            <div class="col-md-6">
                                <select class="form-control" id="course" name="course">
                                    @foreach($data['courses'] as $course)
                                        <option>{{ $course->course_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hobbies" class="col-md-4 col-form-label text-md-right">{{ __('Hobbies') }}</label>

                            <div class="col-md-6">
                                <textarea rows="4" id="hobbies" class="form-control @error('hobbies') is-invalid @enderror" placeholder="What are their hobbies?" name="hobbies"></textarea>

                                @error('hobbies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="medicalhistory" class="col-md-4 col-form-label text-md-right">{{ __('Medical History') }}</label>

                            <div class="col-md-6">
                                <textarea rows="4" id="medicalhistory" class="form-control @error('medicalhistory') is-invalid @enderror" placeholder="Medical history of student" name="medicalhistory"></textarea>

                                @error('medicalhistory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>
	</div>
@endsection