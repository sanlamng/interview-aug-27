<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <a class="header-brand" href="<?php echo e(route('user.dashboard')); ?>"><i class="mdi mdi-bank" style="font-size: 1.6em;"></i> <?php echo e(strtoupper(config('nt_config.company_name'))); ?></a>
                        <div class="text-right ml-auto">
                            <h2 class="mb-1"><?php echo e($transaction->ref); ?></h2>
                            <p class="mb-1"><span class="font-weight-semibold">Invoice Date :</span> <?php echo e($transaction->created_at->format('d/m/Y')); ?></p>
                            <p><span class="font-weight-semibold">Payment Date :</span> <?php echo e($transaction->created_at->format('d/m/Y')); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="h3"><?php echo e($transaction->user->name); ?></p>
                            <address><?php echo e($transaction->user->phone); ?><br><?php echo e($transaction->user->email); ?></address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table- table-hover mb-0">
                            <tbody>
                                <tr class="thead-dark">
                                    <th>Product</th>
                                    <th class="text-right">Amount Paid</th>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold"><?php echo e($transaction->product->name); ?></td>
                                    <td class="font-weight-bold text-right"><?php echo e($transaction->amount); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('user.transaction.pdf', $transaction->uid)); ?>"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/user/transaction/show.blade.php ENDPATH**/ ?>