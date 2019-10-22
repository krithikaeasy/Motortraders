@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Details</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-success" role="alert">
                            Email : {{ auth()->user()->email }}
                        </div>

                        <div class="alert alert-success" role="alert">
                            First Name : {{ auth()->user()->userDetail->first_name }}
                        </div>

                        <div class="alert alert-success" role="alert">
                            Last Name : {{ auth()->user()->userDetail->last_name }}
                        </div>

                        <div class="alert alert-success" role="alert">
                            Address : {{ auth()->user()->userDetail->address }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Manufacture</th>
                <th>Model Name</th>
                <th>CC</th>
                <th>Reg No</th>
                <th>Millage</th>
                <th>Year</th>
                <th>Colour</th>
                <th>Price</th>
                <th>Images</th>
            </tr>
            </thead>
            <tbody>
            @foreach(auth()->user()->userMotor as $motor)
                <tr>
                    <td>{{ $motor->type }}</td>
                    <td>{{ $motor->manufacture }}</td>
                    <td>{{ $motor->model_name }}</td>
                    <td>{{ $motor->cc }}</td>
                    <td>{{ $motor->reg_number }}</td>
                    <td>{{ $motor->millage }}</td>
                    <td>{{ $motor->year }}</td>
                    <td>{{ $motor->colour }}</td>
                    <td>{{ $motor->price }}</td>
                    <td>
                        @foreach($motor->motorImages as $image)
                            <img style="height: 35px; width: 35px;" src="{{ asset('storage/' . $image->url) }}" alt="">
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
