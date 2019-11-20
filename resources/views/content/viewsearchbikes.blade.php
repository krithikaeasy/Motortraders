@extends('content.master')
@section('search')

    <table cellpadding="10" cellspacing="7">
        <tr>
            <th>ID:</th>
            <th>manufacture:</th>
            <th>model:</th>
            <th>price:</th>
            <th>year:</th>
            <th>colour:</th>
            <th>cc:</th>
            <th>image:</th>

        </tr>
        @foreach ($paginator as $search)
            <tr>
                <td>{{$search->id}}</td>
                <td>{{$search->manufacture}}</td>
                <td>{{$search->model_name}}</td>
                <td>{{$search->price}}</td>
                <td>{{$search->year}}</td>
                <td>{{$search->colour}}</td>
                <td>{{$search->cc}}</td>
                <td>
                    @foreach($search->motorImages as $key => $image)
                        @if($key==0)
{{--                            <img alt="" src="{{asset('storage/avatars/'. $image->images . '')}}">--}}
                            <img style="height: 60px; width: 60px;" src="{{ asset('storage/' . $image->url) }}" alt="">

                        @endif
                    @endforeach
                </td>
                <td>
{{--                    <form action="{{url('search')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" value="{{$search->id}}" name="id">--}}
{{--                        <input type="submit" value="click">--}}
{{--                    </form>--}}
                    <a href="{{ url('motor/' . $search->id) }}">View</a>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $paginator->links() !!}


@endsection





