@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
    <div class="form-group">
        <label for="size-id">Products Name</label>
        <input type="text" class="form-control" id="size-id" name="name" placeholder="Enter Product Size" value="{{isset($size)? $size->name : ''}}">
    </div>
    <div class="form-group">
        <label for="size-id">Products Price</label>
        <input type="text" class="form-control" id="product_price" name="price" placeholder="Enter Product Size" value="{{isset($size)? $size->name : ''}}">
    </div>
    <div class="form-group">
        <label for="size-id">Products Status</label>
        <input type="checkbox" name="status" checked data-bootstrap-switch>
    </div>
    <div class="form-group">
        <label for="product_size">Products Size</label>
        <select name="size_id" id="product_size" class="form-control">
            <option value="">--Select A Size--</option>
            @if (!empty($sizes) && count($sizes)>0)
                @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
                    
                @endforeach
            @endif
        </select>
    </div>
</div>            
@endsection