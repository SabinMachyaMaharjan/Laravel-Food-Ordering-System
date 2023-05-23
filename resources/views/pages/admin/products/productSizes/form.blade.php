@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
    <div class="form-group">
        <label for="size-id">Product Size Name</label>
        <input type="text" class="form-control" id="size-id" name="name" placeholder="Enter Product Size" value="{{isset($size)? $size->name : ''}}">
    </div>
</div>            
@endsection