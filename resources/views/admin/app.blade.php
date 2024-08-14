<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>dashboard|
   @yield('title')
    </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{asset ('front/img/logo1.PNG')}}" rel="icon">
  <link href="{{asset ('front/img/logo1.PNG')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

  @livewireStyles
</head>

<body>
{{-- @include('sweetalert::alert')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@include('includes.admin.navbar')
@include('includes.admin.sidebar')
@yield('content')
@stack('scripts')
@include('includes.admin.footer')
 <!-- Vendor JS Files -->
 @livewireScripts

 <script src="//unpkg.com/alpinejs" defer></script>
 <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 {{-- <script src="{{asset('admin/vendor/chart.js/chart.umd.js')}}"></script>
 <script src="admin/vendor/echarts/echarts.min.js"></script> --}}
 <script src="{{asset('admin/vendor/quill/quill.js')}}"></script>
 <script src="{{asset('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
 <script src="{{asset('admin/vendor/tinymce/tinymce.min.js')}}"></script>
 <script src="{{asset('admin/vendor/php-email-form/validate.js')}}"></script>
 <script src="https://cdn.tiny.cloud/1/dinjailgf8gbayqx8wfb0eak8y5s598j8a6145agbt6cf55b/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
 <!-- Template Main JS File -->
 <script src="{{asset('admin/js/main.js')}}"></script>
 
</body>

</html>
