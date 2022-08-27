<?php ($page = "Register"); ?>


<?php $__env->startSection('content'); ?>
    <p class="text-muted">Welcome, register an account below</p>
    <form action="<?php echo e(route('register')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Your Full Name" aria-label="name" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
            <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" placeholder="username" aria-label="username" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" aria-label="email" placeholder="Email Address" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon" title="Date of Birth" data-toggle="tooltip"><i class="fa fa-calendar"></i></span>
            <input type="date" class="form-control" name="dob" value="<?php echo e(old('dob')); ?>" aria-label="dob" placeholder="Date of Birth" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
            <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" aria-label="phone" placeholder="Phone Number" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" aria-label="password" placeholder="Password" />
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="password_confirmation" aria-label="password_confirmation" placeholder="Password confirmation" />
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo NoCaptcha::display(); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
            <div class="col-12">
                <a href="<?php echo e(route('login')); ?>" class="btn btn-link box-shadow-0 px-0">Have an account?</a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo NoCaptcha::renderJs(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fbni\resources\views/auth/register.blade.php ENDPATH**/ ?>