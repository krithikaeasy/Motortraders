<table cellspacing="16">
    <tr>
        <th>manufacture:</th>
        <th>model:</th>
        <th>price:</th>
        <th>year:</th>
        <th>colour:</th>
        <th>cc:</th>
        <th>image:</th>
        <th>User Email:</th>
        <th>User Name:</th>

    </tr>
    <tr>
        <td>{{$motor->manufacture}}</td>
        <td>{{$motor->model}}</td>
        <td>{{$motor->price}}</td>
        <td>{{$motor->year}}</td>
        <td>{{$motor->colour}}</td>
        <td>{{$motor->cc}}</td>
        <td>
            @foreach($motor->motorImages as $key=>$image)
                @if($key==0)
{{--                    <img src="{{asset('storage/avatars/'.$image->image.'')}}">--}}
                    <img style="height: 60px; width: 60px;" src="{{ asset('storage/' . $image->url) }}" alt="">

                @endif
            @endforeach
        </td>
        <td>{{$motor->user->email}}</td>

        <td>{{ $motor->user->userDetail->first_name }} {{ $motor->user->userDetail->last_name }}</td>
    </tr>
</table>





