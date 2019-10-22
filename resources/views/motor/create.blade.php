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

                        <form method="POST" action="{{ url('motor') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle Type') }}</label>
                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">
                                    @error('type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="manufacture" class="col-md-4 col-form-label text-md-right">{{ __('Manufacture') }}</label>
                                <div class="col-md-6">
                                    <input id="manufacture" type="text" class="form-control @error('manufacture') is-invalid @enderror" name="manufacture" value="{{ old('manufacture') }}">
                                    @error('manufacture')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model-name" class="col-md-4 col-form-label text-md-right">{{ __('Model Name') }}</label>
                                <div class="col-md-6">
                                    <input id="model-name" type="text" class="form-control @error('model_name') is-invalid @enderror" name="model_name" value="{{ old('model_name') }}">
                                    @error('model_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reg-number" class="col-md-4 col-form-label text-md-right">{{ __('Reg Number') }}</label>
                                <div class="col-md-6">
                                    <input id="reg-number" type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" value="{{ old('reg_number') }}">
                                    @error('reg_number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="millage" class="col-md-4 col-form-label text-md-right">{{ __('Millage') }}</label>
                                <div class="col-md-6">
                                    <input id="millage" type="text" class="form-control @error('millage') is-invalid @enderror" name="millage" value="{{ old('millage') }}">
                                    @error('millage')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cc" class="col-md-4 col-form-label text-md-right">{{ __('CC') }}</label>
                                <div class="col-md-6">
                                    <input id="cc" type="text" class="form-control @error('cc') is-invalid @enderror" name="cc" value="{{ old('cc') }}">
                                    @error('cc')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>
                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}">
                                    @error('year')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colour" class="col-md-4 col-form-label text-md-right">{{ __('Colour') }}</label>
                                <div class="col-md-6">
                                    <input id="colour" type="text" class="form-control @error('colour') is-invalid @enderror" name="colour" value="{{ old('colour') }}">
                                    @error('colour')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
                                    @error('price')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
                                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <input id="images" accept="image/*" type="file" class="form-control @error('images') is-invalid @enderror @error('images.0') is-invalid @enderror" name="images[]" multiple>
                                    @error('images')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    @error('images.0')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add New Motor') }}
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
