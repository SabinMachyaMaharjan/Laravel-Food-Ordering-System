@extends('layouts.grandLayout')

@section('dashboard-content')
    @php
      $breadcrumb=['Dashboard'=>route('vendor.dashboard'),'Product'=>route('product.index'),'Product Add'=>'#'];
    @endphp
    @include('include.grand.breadcrumbs',['breadcrumb'=>$breadcrumb])
  <div class="container-fluid">
            <!-- general form elements -->
      @if(isset($errors) && count($errors)>0)
        <!-- {{dd($errors)}} -->
        {{-- <!-- @foreach($errors as $item)  
          {{echo($item)}}
        @endforeach   --> --}}
      @endif
    <div class="row justify-content-center"> 
      <div class="card card-primary col-md-8">
                <div class="card-header">
                  <h3 class="card-title">Add Product </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div>
                  <form method="POST" action="{{route('product-item.store')}}">
                      @csrf
                    <div class="card-body">
                      @include('pages.client.products.form' ,['products'=>$products])  
                     
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
@section('page-specific-js')
        <!-- Bootstrap Switch -->
    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script> 
        $(function() {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        })
    </script>
@endsection