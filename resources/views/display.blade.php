<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    {{-- for the title of each blade  --}}
    <title>@yield('title')</title>

    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="google-site-verification" content="">
    <meta name="DC.title" content="Laravel 5 Starter Site">
    <meta name="DC.subject" content="">
    <meta name="DC.creator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- for cdn and global style sheet  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">

    {{-- the styless for each blade   --}}
    @yield('styles')

</head>
<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>

    @yield('scripts')

</body>
</html>
