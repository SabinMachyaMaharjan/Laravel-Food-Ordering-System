<html>
    <head>
    <meta>
    </meta>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('style.css')}}">
        <title>Document</title>
    </head>
    <body>
        <form action="{{route('new-sweet.update,$sweet->$id')}}" method="POST">
            @csrf 
            @method('PUT')
            <div>
                <label for="">Name</label>
                <input type="text" name="sweet1" id="s1" placeholder="Enter Sweet Name" value="{{isset($sweet)? $sweet->name : '-'}}">
            </div>
            <div>
                <label for="">Color</label>
                <input type="text" name="sweet2" id="s2" placeholder="Enter Sweet Color" value="{{isset($sweet)? $sweet->color : '-'}}">
            </div>
            <div>
                <label for="">Is prefferable?</label>
                <select name="is_prefferable" id="">
                    <option value="" selected>--Select any options--</option>
                    <option value="yes" {{isset($sweet)? ($sweet->is_prefferable=='yes'? 'selected' : '')}}>Yes</option>
                    <option value="no" {{isset($sweet)? ($sweet->is_prefferable=='no'? 'selected' : '')}}>No</option>
                    <option value="maybe" {{isset($sweet)? ($sweet->is_prefferable=='maybe'? 'selected' : '')}}>Maybe</option>
                </select>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </body>
</html>