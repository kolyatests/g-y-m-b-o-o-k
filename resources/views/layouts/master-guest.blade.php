<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">




    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GYMBOOK</title>
</head>
<body>
<br><br><br>
<div class="container">
    @yield('content')
</div>
@stack('scripts')
<script>
    $(function () {
        $('.alert-success').fadeOut(3000);
    });
</script>
</body>
</html>
