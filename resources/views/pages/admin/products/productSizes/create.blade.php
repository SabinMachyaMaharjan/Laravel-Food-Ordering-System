@extends('layouts.grandLayout')

@section('dashboard-content')
    @php
      $breadcrumb=['Dashboard'=>'/admin/dashboard','Product Size'=>'/admin/product-size','Product Size Add'=>'#'];
    @endphp
    @include('include.grand.breadcrumbs',['breadcrumb'=>$breadcrumb])
  <div class="container-fluid">
            <!-- general form elements -->
      @if(isset($errors) && count($errors)>0)
        {{dd($errors)}}
        {{-- <!-- @foreach($errors as $item)  
          {{echo($item)}}
        @endforeach   --> --}}
      @endif
    <div class="row justify-content-center"> 
      <div class="card card-primary col-md-8">
                <div class="card-header">
                  <h3 class="card-title">Add Product Size</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div>
                  <form method="POST" action="{{route('product-size.store')}}">
                      @csrf
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