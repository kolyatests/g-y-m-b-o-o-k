<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/calendar.css')}}"/>
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom_1.css')}}"/>
{{--    <link rel="stylesheet" href="{{asset('css/media.css')}}" type="text/css">--}}
    {{--    <script src="{{asset('js/modernizr.custom.js')}}"></script>--}}
    <script src="{{asset('js/jquery.min.js')}}"></script>
    {{--    <link rel="stylesheet" href="{{asset('css/app2.css')}}" type="text/css">--}}

    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>gym</title>

</head>
<body>

<div id="app">
    <div class="container1">
        <!-- Push Wrapper -->
        <div class="mp-pusher" id="mp-pusher">
            <div class="block">
                <a href="{{route('sport.main')}}" id="trigger"><img src="{{Storage::url('image/Sports-Dumbbell-black.png')}}" width="50" height="50"
                                                 alt=""/></a>
            </div>

            <div class="scroller1"><!-- this is for emulating position fixed of the nav -->
                <div class="scroller-inner container">
                    @yield('content')
                </div><!-- /scroller-inner -->
            </div><!-- /scroller -->
        </div><!-- /pusher -->
    </div><!-- /container -->
</div>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}


{{--<script src="js/mlpushmenu.js"></script>--}}


{{--<script>--}}
{{--    new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {--}}
{{--        type: 'cover'--}}
{{--    });--}}
{{--</script>--}}



{{--<script src="{{asset('js/app.js')}}"></script>--}}


<script>
    $(function () {
        $('.alert-success').fadeOut(3000);
    });
</script>
<script src="{{asset('js/alltrains.js')}}"></script>
<script src="{{asset('js/classie.js')}}"></script>
</body>
</html>
