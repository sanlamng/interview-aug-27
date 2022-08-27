<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Title -->
    <title><?php echo e($page ." | ".config('nt_config.company_name')); ?></title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" />
    <!--Style css -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/dark-style.css')); ?>" rel="stylesheet" />

    <!---Icons css-->
    <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr-master/build/toastr.min.css')); ?>">
</head>
<body class="bg-account">
<!-- page -->
<div class="page">
    <!-- page-content -->
    <div class="page-content">
        <div class="container text-center text-dark">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-6">
                                        <h1><i class="mdi mdi-bank" style="font-size: 1.6em;"></i></h1>
                                    </div>
                                    <?php echo $__env->yieldContent('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-content end -->
</div>
<!-- page End-->
<!-- Jquery js-->
<script src="<?php echo e(asset('assets/js/jquery-3.4.1.min.js')); ?>"></script>
<!--Bootstrap.min js-->
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/toastr-master/build/toastr.min.js')); ?>"></script>
<script>
    $(function(){

        let toastOptions = {
            timeOut: 0,
            extendedTimeOut: 0,
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: "toast-top-fullwidth",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "5000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: true,
            closeHtml: '<i class="fe fe-close"></i>'
        };
        <?php if($errors->any()): ?>
            let error_msg = `
                <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-item"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            `;
            toastr.warning(error_msg, toastOptions);
        <?php endif; ?>

        <?php if(session()->has('status')): ?>
            let status_msg = "<?php echo e(session()->get('status')); ?>";
            toastr.success(status_msg, toastOptions);
        <?php endif; ?>
    });
</script>
<?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fbni\resources\views/layouts/auth.blade.php ENDPATH**/ ?>