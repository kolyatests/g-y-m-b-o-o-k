<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>gym</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--    <link rel="stylesheet" href="{{asset('css/media.css')}}" type="text/css">--}}
    <link rel="stylesheet" href="/css/admin.css">

    <style>
        table.table form {
            display: inline-block;
        }

        button.delete {
            background: transparent;
            border: none;
            color: #337ab7;
            padding: 0px;
        }
    </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('sport.main')}}" class="logo">
            <span class="logo-lg"><b> админ</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Storage::url(auth()->user()->getImage())}}" class="img-circle" alt="">
                </div>
                <div class="pull-left info">
                    <p>{{auth()->user()->name}}</p>

                    @if(auth()->user()->isOnline())
                        <span style="color:green">В сети</span>
                    @else
                        <span style="color:red">Не в сети</span>
                    @endif

                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            "@include('admin._sidebar')
        </section>
        <!-- /.sidebar -->
    </aside>


@yield('content')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
            </div>
        </div>
    </aside>

</div>

<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugins/ckfinder/ckfinder.js')}}"></script>
<script>
    $(document).ready(function () {
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor(editor);
    });
    $(function () {
        $('.alert-success').fadeOut(3000);
    });
</script>

</body>
</html>
