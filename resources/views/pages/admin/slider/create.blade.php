@extends('layouts.grandLayout')
@section('page-specific-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

  <!-- <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->
@endsection
@section('dashboard-content')
<div class="content pt-4">
           <!-- general form elements -->
    <!-- @if(isset($errors) && count($errors)>0)
      {{dd($errors)}} 
      @foreach($errors as $item)  
        {//{echo($item)}}
      @endforeach  
    @endif  -->
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header" data-background-color="yellow">
                            <h4 class="title">Add Slider</h4>
                        </div>

                            <div class="card-content">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                <!-- @method('PUT') -->
                @csrf
                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating" style="margin-left: 5px;margin-right:5px;">
                                            <label class="control-label" for="slider-text-id">Slider text</label>
                                            <input type="text" class="form-control " name="slider_text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label label-floating" for="slider-image" style="margin-left:5px;margin-right:5px;">Image input</label>
                                        <input type="file"  id="slider-image" name="slider_image" style="padding: 5px;border-radius:2px;">
                                <!-- <label class="control-label" for="slider-image">Choose file</label> -->
                              </div>
                            </div>
                            <div>
                                @if(isset($slider))
                                <div>    
                                    <label for="slider">Current Slider</label>
                                    <br>
                                    <img src="{{asset('storage/slider/'.$slider->slider_image)}}" alt="{{$slider->slider_image}}" width="150px">
                                </div>
                                @endif
                            </div>             
                           {{-- 
                            <!-- <div class="card-body">
                              @include('pages.admin.slider.form')  
                              <div class="container-fluid"> -->
                                --}}
                                <br>  
                                <a href="{{ route('slider.index') }}" class="btn btn-danger ps-4" style="margin-left: 5px;margin-right:5px;margin-bottom:5px;">Back</a>
                  <button type="submit" class="btn btn-primary ps-4" style="margin-left: 5px;margin-right:5px;margin-bottom:5px;" onclick="sweetAlertConfirm(event)">Submit</button>
                                
  
                       
                           
              </form>
              </div>
    </div>
            <!-- /.card -->
</div>    
    </div>  
    </div>
</div>   

@endsection
@section('page-specific-js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script>
    function sweetAlertConfirm(e)
    {
        let ret=false;
        e.preventDefault();
        console.log('Hi!');
        Swal.fire({
        title: 'Slider Created!',
        icon: 'warning',
    });
  }
  </script>   
@endsection