@extends('layouts.grandLayout')

@section('dashboard-content')
<!-- <div class="container-fluid"> -->
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
            <div class="white-box">
                <h3 class="box-title">Add Slider</h3>
                <div class="form">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                <!-- @method('PUT') -->
                @csrf
                  <!-- <div class="card-body">
                  @include('pages.admin.slider.form')  
                  <div class="container-fluid"> -->
    <div class="mb-3">
                        <label for="slider-text">Slider text</label>
                        <input type="text" class="form-control" id="slider-text" name="slider_text" placeholder="Enter name" value="{{isset($slider)? $slider->slider_text : ''}}">
    </div>
                    <div class="mb-3">
                        <label for="slider-image">File input</label>
                        <div class="form-label">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="slider-image" name="slider_image">
                                <label class="custom-file-label" for="slider-image">Choose file</label>
                            </div>
                            <!-- <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div> -->
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
                       
                <!-- /.card-body -->
                
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary" onclick="sweetAlertConfirm(event)">Submit</button>
                </div>
              </form>
              </div>

    </div>
            <!-- /.card -->
</div>    
    </div>  
    </div>
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div>
      <a href="/admin/portfolio" class="btn btn-info text-white mb-3"><i class="fas fa-angle-left"></i> Back</a>
    </div>
    <div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Create New Portfolio</h3>

                <div class="form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputName" class="form-label">Project Name<span style="color:#ff9933;">*</span></label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="ex: 7thirteensalon" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                          <label for="proj_url" class="form-label">Project Url<span style="color:#ff9933;">*</span></label>
                          <input type="text"  name="link" class="form-control" id="proj_url" placeholder="ex: https://7thirteensalon.com/" value="{{old('link')}}">
                        </div>
                        <div class="mb-3">
                            <label for="proj_desc" class="form-label">Project description<span style="color:#ff9933;">*</span></label>
                            <textarea  name="description" class="form-control" id="proj_desc" placeholder="ex: 7thirteensalon is a Salon Management System...">{{old('description')}}</textarea>
                          </div>
                          <div class="mb-3">
                            <label for="proj_cat" class="form-label">Project Category<span style="color:#ff9933;">*</span></label>
                            <select id="proj_cat" name="category" class="form-select" aria-label="Default select example">
                              <option selected>Select Project Category</option>
                              <option value="app" {{ (old('category') == 'app' ?'selected':'')}}>Applications</option>
                              <option value="digital" {{ (old('category')== 'digital' ?'selected':'')}} >Digital Marketing</option>
                              <option value="portfolio" {{ (old('category')== 'portfolio' ?'selected':'')}}>Portfolio</option>
                              <option value="graphics" {{ (old('category')== 'graphics' ?'selected':'')}} >Graphics</option>
                              <option value="other" {{ (old('category')== 'other'?'selected':'')}}>Other</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="proj_tech" class="form-label">Technology Used<span style="color:#ff9933;">*</span></label>
                            <input type="text"  name="tech_used" class="form-control" id="proj_tech" placeholder="Laravel, JS, HTML..." value="{{old('tech_used')}}">
                          </div>
                          <div class="mb-3">
                            <label for="proj_tech" class="form-label">Renew Date(A.D)<span style="color:#ff9933;">*</span></label>
                            <input type="text"  name="renewal_date" class="form-control" id="date" placeholder="Ex:2021-03-25" value="{{old('renewal_date')}}">
                          </div>
                          <div class="mb-3">
                            <label for="formFile" class="form-label">Project Image<span style="color:#ff9933;">*</span></label>
                            <input class="form-control" type="file" id="formFile" name="image">
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
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
        title: 'Slider Created!',
        icon: 'warning',
    });
  }
  </script>   
@endsection