<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>Dental Lab Management System</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}" type="text/css">
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('content')

    </div>
    @include('layouts.footer')

</body>

</html>
