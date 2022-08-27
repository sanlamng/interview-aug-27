<?php $__env->startSection('content'); ?>
    <p class="text-muted">Enter your registered email address to get reset link</p>
    <form action="<?php echo e(route('password.email')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="example@domain.com" />
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="<?php echo e(route('register')); ?>" class="btn btn-link box-shadow-0 px-0">Register an account</a>
            </div>

            <div class="col-6">
                <a href="<?php echo e(route('login')); ?>" class="btn btn-link box-shadow-0 px-0">Remembered password?</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>