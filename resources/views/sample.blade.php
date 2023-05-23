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
        <form action="{{route('form')}}" method="post">
            @csrf 
            <div>
                <h4>Simple Calculator</h4>
            </div>
            <div>
                <div style="padding-bottom:10px;"></div>
                <label for="">Number1</label>
                <input type="number" name="num1" id="n1" placeholder="Enter 1st Number">
            </div>
            <div>
                <label for="">Number2</label>
                <input type="number" name="num2" id="n2" placeholder="Enter 2nd Number">
            </div>
            <hr>
            <h6>Operations</h6>
            </div>
            <div>
                <input type="radio" name="operation" id="a" value="add">
                <label for="">Addition</label>
            </div>
            <div>
                <input type="radio" name="operation" id="s" value="subtract">
                <label for="">Substraction</label>
            </div>
            <div>
                <input type="radio" name="operation" id="m" value="multiply">
                <label for="">Multiplication</label>
            </div>
            <div>
                <input type="radio" name="operation" id="d" value="divide">
                <label for="">Division</label>
            </div>
            <br>
            <div>
                <button type="submit" onclick="validateform(event)">Submit</button>
            </div>
        </form>
        <div>
            <h5>Output:</h5>
            <div>
                {{$output}}
            </div>
        </div>
    </body>
</html>