<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
{{--    <link rel="stylesheet" href="{{asset('css/media.css')}}" type="text/css">--}}
{{--    <link rel="stylesheet" href="{{asset('css/app2.css')}}" type="text/css">--}}
    <link rel="stylesheet" type="{{asset('text/css" href="css/custom_1.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
{{--        <script src="{{asset('js/menus.js')}}"></script>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">





    <title>gym</title>

</head>

<body>
<div id="app">
    <div class="container1 ">
        <!-- Push Wrapper -->
        <div class="mp-pusher" id="mp-pusher">
            <div class="block">
                <a href="{{route('book.main')}}" id="trigger"><img src="{{ Storage::url('image/Sports-Dumbbell-black.png')}}" width="50"
                                              height="50" alt=""/></a>
            </div>
            <!-- mp-menu -->
            @include('book.menu.menu')
            {{--        <div class="scroller1"><!-- this is for emulating position fixed of the nav -->--}}
            <div class="scroller-inner container ">

                {{--                @include('layouts.errors')--}}
                @yield('content')


            </div><!-- /scroller-inner -->
            {{--        </div><!-- /scroller -->--}}

        </div><!-- /pusher -->
    </div><!-- /container -->

</div>
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/mlpushmenu.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

@if(Route::currentRouteName()!='book.wall'&& Route::currentRouteName()!='profile_user' && Route::currentRouteName()!='book.post.show')

    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('plugins/ckfinder/ckfinder.js')}}">

    </script>
@endif
<script>

    new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
        type: 'cover'
    });
    $(function () {
        $('.alert-success').fadeOut(3000);
    });
    @if(Route::currentRouteName()!='book.wall'&& Route::currentRouteName()!='profile_user' && Route::currentRouteName()!='book.post.show')
    $(document).ready(function () {
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor(editor);
    });
    @endif

</script>
</body>
</html>


