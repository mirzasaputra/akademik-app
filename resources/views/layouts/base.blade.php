<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="api-url-1" content="http://192.168.43.129:8000/api/v1">
    <meta name="api-url-2" content="http://192.168.43.37:8000/api/">
    <title>{{ $title ?? 'Untitle Page' }} | Akademik App</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.bootstrap.min.css') }}">
</head>
<body class="bg-light">
    @yield('app')
</body>
</html>