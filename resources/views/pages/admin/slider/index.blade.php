@extends('layouts.grandLayout')
@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('dashboard-content')
<div class="container-fluid">
<div class="card">
              <div class="card-header d-flex justify-content-end">
                <a href="{{route('slider.create')}}" class="btn btn-success">Add Slider</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN.</th>
                    <th>Slider Image</th>
                    <th>Slider Title</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @php
                        $c=1;
                      @endphp
                      @if(isset($sliders)&&count($sliders)>0)
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$c}}</td>
                                <td>
                                  <img src="{{asset('storage/slider/'.$slider->slider_image)}}" alt="{{$slider->slider_image}}" width="150px" >
                                    <!-- {/{$slider->slider_image}} -->
                                </td>
                                <td>{{$slider->slider_text}}</td>
                                <td class="d-flex ">
                                  <a href="slider/{{$slider->id}}/edit" class="btn btn-info mr-4">Edit</a>
                                  <form action="{{route('slider.destroy',$slider->id)}}" id="sldier-delete-form" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onClick="sweetAlertConfirm(event), {{$slider->id}}">Delete</button>
                                  </form>
                                </td>
                            </tr>
                            @php
                              $c++;
                            @endphp  
                        @endforeach
                      @endif  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SN.</th>
                    <th>Slider Image</th>
                    <th>Slider Title</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>    
@endsection
@section('page-specific-js')
    <!-- DataTables  & Plugins -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": false,
            "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            console.log('Hi laravel developers!!');
            const Toast = Swal.mixin({
          // {
          //   toast:true;
          //   position:;
          // }
          customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false});
        });
        function sweetAlertConfirm(e,id)
        {
            let ret=false;
            e.preventDefault();
            console.log('Hi!');
            Swal.fire({
            title: 'Are you sure ypu want to delete?',
            //text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            //reverseButtons: true
        }).then(result => {
        if (result.isConfirmed) {
          // console.log(result.isConfirmed);
          // ret=true;
          $("#slider-delete-form").attr('action','/admin/slider/${id}');
          $("#slider-delete-form").submit();
              } else {
                e.preventDefault();
              }
            })
            return ret;
            //console.log(ret);  
        }  
        function confirmation(e)
        {
            if(confirm('Are you sure you want to delete?')){
              return true;
            } else {
              e.preventDefault(e);
            }
        }
    </script>
@endsection