<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Ordering System | Dashboard</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <!--  Other Bootstrap 5.0.2 CSS -->
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.rtl.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.grid.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.grid.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.grid.rtl.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.grid.rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.reboot.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.reboot.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.reboot.rtl.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.reboot.rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.utilities.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.utilities.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.utilities.rtl.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap.utilities.rtl.min.css')}}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/fontawesome.min.css" integrity="sha512-IejtbqJqhyw0pAfIGrqsO/+9McIyWp3zwz9Y0oKOpsSo9XHOCWwPcS6ezTpdDG5ZIkmMdvkkd1eq7C56fRqYxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('dist/js/bootstrap.js')}}"></script>
  <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dist/js/bootstrap.esm.js')}}"></script>
  <script src="{{asset('dist/js/bootstrap.esm.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  @yield('page-specific-css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  <span class="animation_shake">Loading .... Please Be Patient</span>
  </div> -->

@include('include.grand.navbar', ['key' => !empty($key)? $key : ''])
@include('include.grand.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
        <!-- @include('include.notification') -->
        @include('sweetalert::alert')
        @yield('dashboard-content') 
      </section>
  </div>
@include('include.grand.footer')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script> -->
<!-- Sparkline -->
<!-- <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script> -->
<!-- JQVMap -->
<!-- <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> -->
<!-- daterangepicker -->
<!-- <script src="{{asset('plugins/moment/moment.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<!-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{(asset('js/activePanel.js')}}"></script>
<!-- <script src="{{asset('dist/js/adminlte.min.js')}}"></script> -->

<!-- AdminLTE for demo purposes -->
<!-- {{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}} -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- {{-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> --}} -->
<!-- Others JS BootStrap 5.0.2 -->
<script src="{{asset('dist/js/bootstrap.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.esm.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.esm.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/cjs/popper.min.js" integrity="sha512-pPMH8RM+mnjHk8orl1wXPrbsUZrpmIQDkU6s0PMdNB/OItHAu0pn4d4FoY/4BBa3Gj6iMafbgTYgdNV6nwM8Hw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
   
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    Custom CSS -->
@yield('page-specific-js')
</body>
</html>
