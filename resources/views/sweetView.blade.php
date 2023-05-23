<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(isset($sweets)&& count($sweets)>0)
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Is_preferrable</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($sweets as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->color}}</td>
                        <td>{{$item->is_preferrable}}</td>
                        <td>
                            <a href="/new-sweet/{{$item->id}}/edit">Edit</a>
                            <a href="/new-sweet/{{$item->id}}">Show</a>
                            <form action="{{route('new-sweet.destroy',$item->$id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>   
            </tbody>
        </table>
    @else
        <div>Nothing to display</div> 
    @elseif       
</body>
</html>