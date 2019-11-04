<table>
    <tr>
        <th>manufacture:</th> 
        <th>model:</th>
        <th>state:</th>
        <th>district:</th>
        <th>price:</th>
        <th>year:</th>
        <th>colour:</th>
        <th>cc:</th>
        <th>email:</th>
        <th>mobile:</th>
        <th>name:</th>
    </tr>
    

        <tr>
            <td>{{$searchdisplay->manufacture}}</td>
            <td>{{$searchdisplay->model_name}}</td>
            <td>{{$searchdisplay->state}}</td>
            <td>{{$searchdisplay->district}}</td>
            <td>{{$searchdisplay->price}}</td>
            <td>{{$searchdisplay->year}}</td>
            <td>{{$searchdisplay->colour}}</td>
            <td>{{$searchdisplay->cc}}</td>
            <td>{{$searchdisplay->email}}</td>
            <td>{{$searchdisplay->mobile}}</td>
            <td>{{$searchdisplay->name}}</td>
            <td>
                @foreach($searchdisplay->motorImages as $image)
                    
                    <img src="{{asset('storage/avatars/'.$image->image.'')}}" > 
                    
                @endforeach
            </td>
            
            
            <td>
               
               <form action="{{url('searchbikesreturn')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$searchdisplay->id}}" name="id">
                    <input type="submit" value="go back">
                </form>   
            </td>
        </tr>
   
</table>
