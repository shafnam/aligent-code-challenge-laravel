<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>Aligent Code Challenge</title>

    <link href="{{ asset('https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css') }}" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous" rel="stylesheet">
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css') }}" rel="stylesgeet" >
    <link href="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Shafna Mikdar">
    <meta name="keywords" content=""> -->

</head>

<body>
    
    <div class="container mt-5">       
        @yield('content')
    </div>
    
    <script src="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js') }}" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    
    <script src="{{ asset('https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js') }}" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script src="{{ asset('https://rawgit.com/creativetimofficial/material-kit/master/assets/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('https://rawgit.com/creativetimofficial/material-kit/master/assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('https://rawgit.com/creativetimofficial/material-kit/master/assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('https://rawgit.com/creativetimofficial/material-kit/master/assets/js/material-kit.js') }}"></script>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>   
</body>