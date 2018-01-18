@if(request()->pjax() !=1)
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>奕通 | {{$page_title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('static/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('static/dist/css/skins/_all-skins.min.css')}}">

    {{-- 多选--}}
    <link rel="stylesheet" href="{{ asset('/static/iCheck/minimal/blue.css')}}">
    {{--进度条--}}
    <link rel="stylesheet" href="{{ asset('/static/nprogress/nprogress.css')}}">
    <link rel="stylesheet" href="{{asset('/static/plugins/bootstrap-iconpicker/icon-fonts/font-awesome-4.2.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('/static/dist/js/bootstrap/bootstrap-dialog.min.css')}}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">


    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('/static/LocalGoogleFont/local.google.fonts.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header -->
@include('common.header')
<!-- Sidebar -->
@include('common.sidebar')
@endif

<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" id="pjax-container" >


    {{getNavigation()}}


    <!-- Main content -->
        <section class="content" >
        @include('tip/success')
        @include('tip/error')
        <!-- Your Page Content Here -->
            @yield('content')


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


<!-- Footer -->
@if(request()->pjax() !=1)
    @include('common.footer')
    <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('common/script')
@endif

<script>

    //icheck 全选和反选
    $('#checkbox').on('ifChecked', function(event){
        var that = $(this);
        var table = that.closest('.table');
        table.find("tr td input[type='checkbox']").iCheck("check");
    });
    $('#checkbox').on('ifUnchecked', function(event){
        var that = $(this);
        var table = that.closest('.table');
        table.find("tr td input[type='checkbox']").iCheck("uncheck");
    });
</script>
@section('scripts')
    <!-- 	用来给子视图添加script -->
@show
@if(request()->pjax() !=1)
</body>
</html>
@endif
