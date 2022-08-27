<?php
	$page = "404";
?>



<?php $__env->startSection('content'); ?>
	<div class="container text-center text-dark">
        <div class="display-2 mb-5">
            <span class=""><i class="ti-face-smile mr-1"></i></span>ops
        </div>
        <h1 class="h2 mb-5">Error 404: Page Not Found</h1>
        <a class="btn btn-primary mb-0" href="<?php echo e(url()->previous()); ?>"> Go Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/errors/404.blade.php ENDPATH**/ ?>