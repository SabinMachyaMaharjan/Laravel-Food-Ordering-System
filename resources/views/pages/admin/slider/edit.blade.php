@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="content">
<div class="container-fluid">
     <!-- general form elements -->
     <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header" data-background-color="yellow">
    <h4 class="title">Edit Slider</h4>
                        </div>
                        <div class="card-content">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('slider.update',$sliders->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="slider-text-id"  value="{{ $slider->title }}">Slider text</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label" for="slider-image">Image input</label>
                                        <input type="file" class="custom-file-input" id="slider-image" name="slider_image">
                                <label class="custom-file-label" for="slider-image">Choose file</label>
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
                <!-- <div class="card-body">
                    @include('pages.admin.slider.form', ['slider'=>$sliders])  
                </div> -->
                <!-- /.card-body -->

                <!-- <div class="card-footer"> -->
                  <button type="submit" class="btn btn-primary" onClick="sweetAlertConfirm(event)">Submit</button>
                <!-- </div> -->
              </form>
            </div>
            <!-- /.card -->
</div>    
</div>
</div>
</div>
</div>
@endsection
@section('page-specific-js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    function sweetAlertConfirm(e)
    {
        let ret=false;
        e.preventDefault();
        console.log('Hi!');
        Swal.fire({
        title: 'Slider Updated!',
        icon: 'warning',
    });
  }
  </script>   
@endsection