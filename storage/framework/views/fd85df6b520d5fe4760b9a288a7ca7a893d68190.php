<?php if(request()->pjax() !=1): ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>奕通 | <?php echo e($page_title); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('static/dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('static/dist/css/skins/_all-skins.min.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('/static/iCheck/minimal/blue.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('/static/nprogress/nprogress.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/static/plugins/bootstrap-iconpicker/icon-fonts/font-awesome-4.2.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/static/dist/js/bootstrap/bootstrap-dialog.min.css')); ?>">

    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/morris.js/morris.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/jvectormap/jquery-jvectormap.css')); ?>">


    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('js/respond.min.js')); ?>"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="<?php echo e(asset('/static/LocalGoogleFont/local.google.fonts.css')); ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header -->
<?php echo $__env->make('common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Sidebar -->
<?php echo $__env->make('common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" id="pjax-container" >


    <?php echo e(getNavigation()); ?>



    <!-- Main content -->
        <section class="content" >
        <?php echo $__env->make('tip/success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('tip/error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('content'); ?>


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


<!-- Footer -->
<?php if(request()->pjax() !=1): ?>
    <?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php echo $__env->make('common/script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

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
<?php $__env->startSection('scripts'); ?>
    <!-- 	用来给子视图添加script -->
<?php echo $__env->yieldSection(); ?>
<?php if(request()->pjax() !=1): ?>
</body>
</html>
<?php endif; ?>
