@extends('layouts.grandLayout')
@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('dashboard-content')
    @php
      $breadcrumb=['Dashboard'=>route('dashboard'),'Approved Vendors'=>route('pendingVendorIndex')];
    @endphp
    @include('include.grand.breadcrumbs',['breadcrumb'=>$breadcrumb])
    <div class="container-fluid">
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pending-vendor-datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN.</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>BrandName</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @php
                        $c=1;
                      @endphp
                      @if(isset($users)&&count($users)>0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->vendor->brand_name}}</td>
                                <td>{{$user->vendor->service}}</td>
                                <td>{{$user->vendor->is_active? 'Active' : 'Inactive'}}</td>
                                <td class="d-flex ">
                                    @if($user->vendor->is_active)
                                        <a href="{{route('approveVendor',$user->id)}}" class="btn btn-success mr-4">Inactive</a>
                                    @else
                                        <a href="{{route('approveVendor',$user->id)}}" class="btn btn-success mr-4">Active</a>
                                    @endif
                                        <a href="{{route('rejectVendor',$user->id)}}" class="btn btn-danger mr-4">Reject</a>
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
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>BrandName</th>
                    <th>Service</th>
                    <th>Status</th>
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
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#pending-vendor-datatable").DataTable({
            "responsive": true, 
            "lengthChange": false,
            "autoWidth": false,
            }).buttons().container().appendTo('#pending-vendor-datatable_wrapper .col-md-6:eq(0)');
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
            cancelButtonText: 'No,',
            //reverseButtons: true
        }).then(result => {
        if (result.isConfirmed) {
          // console.log(result.isConfirmed);
          // ret=true;
          $("#vendor-delete-form").attr('action','/admin/slider/${id}');
          $("#vendor-delete-form").submit();
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