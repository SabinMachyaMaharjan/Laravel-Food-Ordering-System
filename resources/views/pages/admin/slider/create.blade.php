@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
           <!-- general form elements -->
    {{-- @if(isset($errors) && count($errors)>0)
      {{dd($errors)}} --}}
      {{-- @foreach($errors as $item)  
        {{echo($item)}}
      @endforeach   --}}
    {{-- @endif --}}
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                  <div class="card-body">
                  @include('pages.admin.slider.form')  
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onClick="sweetAlertConfirm(event)">Submit</button>
                </div>
              </form>
    </div>
            <!-- /.card -->
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
  </script>   
@endsection