@extends('content.master')
@section('search')
 
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
            <td>{{$searches->manufacture}}</td>
            <td>{{$searches->model_name}}</td>
            <td>{{$searches->price}}</td>
            <td>{{$searches->year}}</td>
            <td>{{$searches->colour}}</td>
            <td>{{$searches->cc}}</td>
            <td>
                @foreach($searches->motorImages as $key=>$image)
                    @if($key==0)
                    <img src="{{asset('storage/avatars/'.$image->images.'')}}" > 
                    @endif   
                @endforeach
            </td>
            <td>
                <form action="{{url('search')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$searches->id}}" name="id">
                    <input type="submit" value="click">
                </form>
            </td>
        </tr>
     @endforeach   
</table>
@endsection





