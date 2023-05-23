@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
     <!-- general form elements -->
  <div class="row justify-content-center"> 
    <div class="card card-primary col-md-8">
              <div class="card-header">
                <h3 class="card-title">Edit Product Size</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        <div>      
              <form method="POST" action="{{route('product-size.update',$size->id)}}">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                    @include('pages.admin.products.productSizes.form', ['size'=>$size])  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
      </div>
            <!-- /.card -->
  </div>            
</div>    
@endsection