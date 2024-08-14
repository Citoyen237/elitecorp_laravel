<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>elitecorp.org |
        @yield('title')
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset ('front/img/logo1.PNG')}}" rel="icon">
    <link href="{{ asset ('front/img/logo1.PNG')}}" rel="apple-touch-icon">

    <!-- <link href="{% static 'front/favicon.ico'%}" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontlib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front/css/style.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <style>
        .whatsapp_btn {
            position: fixed;
            right: 13px;
            bottom: 90px;
            /* border:1px solid #173d7c */
        }

        .whatsapp_btn:focus {
            box-shadow: none;
        }

        .whatsapp_btn>img {
            height: 50px;
        }
    </style>

    <a class="btn btn-lg whatsapp_btn" target="_blank"
        href="https://wa.me/qr/VV5IWEN3RAALP1"><img
            src="{{asset('front/whatsapp.png') }}" alt="whatsapp"></a>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
     @include('includes.front.header')
     @yield('content')
     @include('includes.front.footer')
     @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front/lib/wow/wow.min.js' )}}"></script>
    <script src="{{asset('frontlib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('front/lib/counterup/counterup.min.js' )}}"></script>
    <script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('front/js/main.js')}}"></script>
</body>

</html>