<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="<?php echo e(config('nt_config.company_name')); ?>" name="description" />
    <meta content="<?php echo e(config('nt_config.company_name')); ?>" name="author" />
    <!-- Title -->
    <title><?php echo e($page["title"] ." | ".config('nt_config.company_name')); ?></title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" />
    <!--Style css -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/dark-style.css')); ?>" rel="stylesheet" />
    <!-- P-scrollbar css-->
    <link href="<?php echo e(asset('assets/plugins/p-scrollbar/p-scrollbar.css')); ?>" rel="stylesheet" />
    <!-- Rightsidebar css -->
    <link href="<?php echo e(asset('assets/plugins/sidebar/sidebar.css')); ?>" rel="stylesheet" />
    <!---Icons css-->
    <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" />
    <!---Skinmodes css-->
    <link href="<?php echo e(asset('assets/css/skin-modes.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr-master/build/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.css')); ?>">
    <?php echo $__env->yieldContent('header'); ?>
</head>
<body class="light-mode boxed">
    <div class="horizontalMenucontainer">
        <!--Global-Loader-->
        <div class="page">
            <div class="page-main">
                <!--Header-->
                <div class="hor-header header d-flex navbar-collapse">
                    <div class="container">
                        <div class="d-flex">
                            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
                            <a class="header-brand" href="<?php echo e(route('user.dashboard')); ?>"><i class="mdi mdi-bank" style="font-size: 1.6em;"></i> <?php echo e(strtoupper(config('nt_config.company_name'))); ?></a>
                        </div>
                    </div>
                </div>
                <!--Header end-->

                <!--Horizontal-main -->
                <?php echo $__env->make('layouts.menu.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--Horizontal-main -->

                <!-- app-content-->
                <div class="container content-area">
                    <ol class="breadcrumb1 bg-primary mt-4">
                        <li class="breadcrumb-item1 text-white"><a class="text-white" href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>
                        <?php if($page['description']): ?>
                            <li class="breadcrumb-item1 text-white"><span><?php echo e($page['title']); ?></span></li>
                            <li class="breadcrumb-item1 text-white active"><span><?php echo e($page['description']); ?></span></li>
                        <?php else: ?>
                            <li class="breadcrumb-item1 text-white active"><span><?php echo e($page['title']); ?></span></li>
                        <?php endif; ?>
                    </ol>
                    <?php echo $__env->yieldContent('content'); ?>
                    <!--End side app-->
                </div>
                <!-- End app-content-->

                <!--Footer-->
                <footer class="footer">
                    <div class="container">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-lg-12 col-sm-12   text-center">Copyright © <?php echo e(date('Y')); ?> <a href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(config('nt_config.company_name')); ?></a>.</div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer-->
            </div>
        </div>
        <!-- End Page -->
        <!-- Back to top -->
        <a href="#top" id="back-to-top" style="display: none;"><i class="fa fa-angle-up"></i></a>
        <!-- End Back to top -->
    </div>

    <!-- Jquery js-->
    <script src="<?php echo e(asset('assets/js/jquery-3.4.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scrollbar/p-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scrollbar/p-scrollbar-hormenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/horizontal-menu/horizontal-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/sidebar/sidebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/toastr-master/build/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.js')); ?>"></script>
    <script>
        $(function(){
            let toastOptions = {
                timeOut: 0,
                extendedTimeOut: 0,
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: true,
                onclick: null,
                showDuration: "300",
                hideDuration: "5000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: true,
                closeHtml: '<i class="fa fa-times"></i>'
            };
            <?php if($errors->any()): ?>
                let error_msg = `
                    <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-item"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                `;
                toastr.warning(error_msg, "", toastOptions);
            <?php endif; ?>

            <?php if(session()->has('status')): ?>
                let status_msg = "<?php echo e(session()->get('status')); ?>";
                toastr.success(status_msg, "", toastOptions);
            <?php endif; ?>

            $('#check_all').click(function () {
                if(this.checked){
                    $('td').each(function () {
                        let boxes = $(this).find('input:checkbox');
                        boxes.each(function () {
                            this.checked = true;
                        });
                    });
                }
                else {
                    $('td').each(function () {
                        let boxes = $(this).find('input:checkbox');
                        boxes.each(function () {
                            this.checked = false;
                        });
                    });
                }
            });
        });
    </script>
    <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fbni\resources\views/layouts/front.blade.php ENDPATH**/ ?>