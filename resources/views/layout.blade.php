<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ getAppDir() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title', '')</title>

    <link href="/img/favicon.ico" rel="SHORTCUT ICON"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @yield('extra-css')
</head>

<body class="@yield('body-class', '')">

@include('partials.nav-sidebar')

@include('partials.nav')

@yield('content')

@include('partials.footer')

@yield('extra-js')

<script>

    let topNave = document.querySelector('.top-nav');
    let navToggler = document.querySelector('.top-nav .nav-sidebar-toggler');
    let navSidebar = document.querySelector('.nav-sidebar');
    let closeNav = document.querySelector('.close-sidebar');
    let locale = document.getElementsByTagName("html")[0].getAttribute("lang");


    window.onload = function () {
        if (window.innerWidth <= 992){
            topNave.classList.add('small-device-nav')
        }else {
            navSidebar.style.right = '-320px';
            topNave.classList.remove('small-device-nav')
        }
    }


    (function () {

        window.addEventListener('resize', () => {
            if (this.innerWidth <= 992){
                topNave.classList.add('small-device-nav')
            }else {
                if (locale === 'ar'){
                    navSidebar.style.right = 'auto';
                    navSidebar.style.left = '-320px';
                }else {
                    navSidebar.style.right = '-320px';
                }
                topNave.classList.remove('small-device-nav')
            }
        });

        navToggler.addEventListener('click', () => {
            if (locale === 'ar'){
                navSidebar.style.right = 'auto';
                navSidebar.style.left = 0;
            }else {
                navSidebar.style.right = 0;
            }
        })

        closeNav.addEventListener('click', () => {
            if (locale === 'ar'){
                navSidebar.style.right = 'auto';
                navSidebar.style.left = '-320px';
            }else {
                navSidebar.style.right = '-320px';
            }
        })
    }())
</script>
</body>
</html>
