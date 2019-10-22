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

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Model Name</th>
                                <th>Reg Number</th>
{{--                                <th>Edit</th>--}}
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($motors as $motor)
                                <tr>
                                    <td>{{ $motor->id }}</td>
                                    <td>{{ $motor->model_name }}</td>
                                    <td>{{ $motor->reg_number }}</td>
                                    <td><a title="Edit the data" class="btn btn-xs btn-warning" href="{{ url('motor/' . $motor->id . '/edit') }}">
                                            <span class="fa fa-pencil"></span>
                                        </a></td>
                                    <td class="text-center">
{{--                                        <a href="javascript:void(0)" class="delete-by-id btn btn-danger" data-id="{{ $motor->id }}">--}}
{{--                                            <span class="fa fa-remove"></span>--}}
{{--                                        </a>--}}
                                        <form method="post" action="{{ url('motor/' . $motor->id) }}" style="display: none;" id="delete-form-{{ $motor->id }}">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-add')

    <script>

        $(document).ready(function () {
            /**
             * Delete
             */
            Body.on('click', '.delete-by-id', function (e) {
                e.preventDefault();
                var id = parseInt($(this).data('id'));

                $('#delete-form-' + id).submit();
            });
        });
    </script>
@endsection
