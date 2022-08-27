<?php $__env->startSection('content'); ?>
<div class="side-app">
    <!-- Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div><h3 class="card-title">Customer's Profile</h3></div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('user.profile.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo method_field('patch'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" aria-label="name" class="form-control" name="name" value="<?php echo e($user->name ?? old('name')); ?>" placeholder="Full Name" required/>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon" title="Date of Birth" data-toggle="tooltip"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="dob" value="<?php echo e($user->dob ?? old('dob')); ?>" aria-label="dob" placeholder="Date of Birth" required/>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            <input type="text" class="form-control" aria-label="username" value="<?php echo e($user->username); ?>" placeholder="username" disabled/>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" aria-label="email" class="form-control" name="email" value="<?php echo e($user->email ?? old('email')); ?>" placeholder="Email Address" required/>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                            <input type="text" aria-label="phone" class="form-control" name="phone" value="<?php echo e($user->phone ?? old('phone')); ?>" placeholder="Phone Number" required/>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Change Password</h3>
                    </div>
                </div>
                <div class="card-body pt-3 pb-3">
                    <div class="memberblock mb-0">
                        <form action="<?php echo e(route('user.profile.change.password', $user->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo method_field('patch'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password"/>
                            </div>
                            <div class="form-group mb-0">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"/>
                            </div>

                            <button type="submit" class="btn btn-danger mt-4">CHANGE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/user/profile.blade.php ENDPATH**/ ?>