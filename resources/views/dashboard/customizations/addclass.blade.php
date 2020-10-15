@extends('dashboard.layout.customizations')

@section('morecontent')
<div class="card">
            <div class="card-header">{{ __('Add Class') }}</div>

                <div class="card-body">
	<form method="POST" action="{{ url('/processAddClass') }}">
                        @csrf

                        @if (session('status'))
    						<div class="alert alert-success">
        						{{ session('status') }}
    						</div>
						@endif

                        <div class="form-group row">
                            <label for="classname" class="col-md-4 col-form-label text-md-right">{{ __('Class Name') }}</label>

                            <div class="col-md-6">
                                <input id="classname" type="text" class="form-control @error('classname') is-invalid @enderror" name="classname" value="{{ old('classname') }}" required autocomplete="classname" autofocus>

                                @error('classname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Class') }}
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
          </div>
@endsection