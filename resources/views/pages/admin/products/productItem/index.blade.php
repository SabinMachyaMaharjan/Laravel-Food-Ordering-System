@extends('layouts.grandLayout')
@section('page-specific-css')
<!-- DataTables -->

    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @endsection @section('dashboard-content') 
    @php
    $breadcrumb=['Dashboard'=>route('vendor.dashboard'),'Products'=>'#'];
    @endphp
    @include('include.grand.breadcrumbs',['breadcrumb'=>$breadcrumb])
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{route('product-item.create')}}" class="btn btn-success">Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="pending-vendor-datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $c=1; 
                        @endphp 
                        @if(isset($products)&&count($products)>0)
                         @foreach($products as $product)
                        <tr>
                            <td>{{$c}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->size->name}}</td>
                            <td>{{$product->status}}</td>
                            <td class="d-flex ">
                                <a href="product/{{$product->id}}/edit" class="btn btn-success mr-4">Edit</a>
                                <form action="{{route('product-item.destroy',$product->id)}}" id="slider-delete-form" method="post">
                                    @method('DELETE')
                                     @csrf
                                    <button class="btn btn-danger" type="submit"
                                        onclick="sweetAlertConfirm(event), {{$product->id}}">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php $c++; @endphp 
                        @endforeach 
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN.</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    @endsection @section('page-specific-js')
    <!-- DataTables & Plugins -->
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
            $("#product-datatable")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
                .buttons()
                .container()
                .appendTo('#product-datatable_wrapper .col-md-6:eq(0)');
            //console.log('Hi laravel developers!!');
            const Toast = Swal.mixin({
                // {   toast:true;   position:; }
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        });

        function sweetAlertConfirm(e, id) {
            let ret = false;
            e.preventDefault();
            console.log('Hi!');
            Swal
                .fire({
                    title: 'Are you sure ypu want to delete?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No,',
                    //reverseButtons: true
                })
                .then(result => {
                    if (result.isConfirmed) {
                        // console.log(result.isConfirmed); ret=true;
                        $("#vendor-delete-form").attr('action', '/admin/slider/${id}');
                        $("#vendor-delete-form").submit();
                    } else {
                        e.preventDefault();
                    }
                })
            return ret;
            //console.log(ret);
        }

        function confirmation(e) {
            if (confirm('Are you sure you want to delete?')) {
                return true;
            } else {
                e.preventDefault(e);
            }
        }

    </script>
    @endsection
