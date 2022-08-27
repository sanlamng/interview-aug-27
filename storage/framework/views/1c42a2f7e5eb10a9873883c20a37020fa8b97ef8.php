<?php ($page = "Login"); ?>


<?php $__env->startSection('content'); ?>
    <p class="text-muted">Sign In to your dashboard</p>
    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="example@domain.com" />
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" />
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="<?php echo e(route('register')); ?>" class="btn btn-link box-shadow-0 px-0">Register an account</a>
            </div>
            
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/auth/login.blade.php ENDPATH**/ ?>