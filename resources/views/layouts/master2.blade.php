<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="{{asset('text/css" href="css/custom_1.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
    <link rel="stylesheet" type="{{asset('text/css" href="css/calendar.css')}}"/>
    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/alltrains.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>gym</title>
</head>
<body>
<div class="container1 ">
    <div class="mp-pusher" id="mp-pusher">
        <div class="block">
            <a href="#" id="trigger"><img src="{{ Storage::url('image/Sports-Dumbbell-black.png')}}" width="50"
                                          height="50" alt=""/></a>
        </div>
        @include('menu.menu')
        <div class="scroller1 " >
            <div class="scroller-inner container">

                @yield('content')

            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/mlpushmenu.js')}}"></script>
<script>
        <?php
        $y = date('Y-m-d H:i:s');
        echo 'var server_date="' . $y . '";';
        ?>
    var cookie_date = new Date();
    var cookie_t = "time=" + cookie_date;
    document.cookie = cookie_t;
    var cookie_s = "time_s=" + server_date;
    document.cookie = cookie_s;
    new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
        type: 'cover'
    });
    $(function () {
        $('.alert-success').fadeOut(3000);
    });
</script>

</body>
</html>
