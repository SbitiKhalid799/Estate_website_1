<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>{{ $title }}</title>
</head>

<body>

    @yield('body')


    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>