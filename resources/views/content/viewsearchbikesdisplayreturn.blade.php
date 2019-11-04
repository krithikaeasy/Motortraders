<table>
    <tr>
        <th>manufacture:</th> 
        <th>model:</th>
        <th>price:</th>
        <th>year:</th>
        <th>colour:</th>
        <th>cc:</th>
        <th>image:</th>
        
    </tr>
    @foreach ($searches as $search)
        <tr>
            <td>{{$search->manufacture}}</td>
            <td>{{$search->model}}</td>
            <td>{{$search->price}}</td>
            <td>{{$search->year}}</td>
            <td>{{$search->colour}}</td>
            <td>{{$search->cc}}</td>
            <td>
            @foreach($search->motorImages as $key=>$image)
                            @if($key==0)
                    <img src="{{asset('storage/avatars/'.$image->image.'')}}" > 
                    @endif   
                @endforeach
            </td>
            <td>
            <td>
            <form action="{{url('searchmainpage')}}" method="post">
                @csrf
                <input type="hidden" value="{{$search->id}}" name="id">
                <input type="submit" value=" back">
            </form>

            </td>
        </tr>
    @endforeach    
</table>





