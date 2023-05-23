
// $value=Session::get('token');
//return value
@if($msg=Session::get('success'))
    <div class="alert alert-success">
        <strong>{{$msg}}</strong>
    </div>
@endif
@if($msg=Session::get('error'))
    <div class="alert alert-danger">
        <strong>{{$msg}}</strong>
    </div>
@endif
@if($msg=Session::get('info'))
    <div class="alert alert-info">
        <strong>{{$msg}}</strong>
    </div>
@endif