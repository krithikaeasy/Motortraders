@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Motor Details
                        <a class="btn btn-success float-right" href="{{ url('motor/create') }}">Create New Motor</a>

                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('motor/' . $motor->id) }}">
                            @csrf
                            {{ method_field('PATCH') }}

                            <div class="form-group row">
                                <label for="model-name" class="col-md-4 col-form-label text-md-right">{{ __('Model Name') }}</label>
                                <div class="col-md-6">
                                    <input id="model-name" type="text" class="form-control @error('model_name') is-invalid @enderror" name="model_name" value="{{ old('model_name', $motor->model_name) }}">
                                    @error('model_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reg-number" class="col-md-4 col-form-label text-md-right">{{ __('Reg Number') }}</label>
                                <div class="col-md-6">
                                    <input id="reg-number" type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ old('reg_number', $motor->reg_number) }}">
                                    @error('reg_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Motor') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
