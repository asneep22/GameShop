<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset("css/app.css")}}">

    <title>@yield('page_title')</title>
</head>

<body class="min-vh-100 d-flex flex-column background">

    @include('header')
    @yield('content')

    <script src="{{URL::asset('js/app.js')}}"></script>
</body>

</html>