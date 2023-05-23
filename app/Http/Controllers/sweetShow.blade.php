<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(isset($sweet))
        <div>
            <p>I love {{$sweet->name}}. It's color is {{$sweet->color}}. {{$sweet->is_prefferable}}!</p>
        </div>    
</body>
</html>