<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p>Filter Transaction by Date</p>
                    <form id="filterForm" action="<?php echo e(route('user.transaction.filter')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4 col-xs-12">
                                <label for="from">From Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="from" type="text" name="from" value="<?php echo e(request('from') ?? null); ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="to">To Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="to" type="text" name="to" value="<?php echo e(request('to') ?? null); ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="btn-group mt-2 mb-2">
                                    <button type="button" class="btn btn-pill btn-primary" data-toggle="dropdown">Export</button>
                                    <button type="button" class="btn btn-pill btn-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(64px, 33px, 0px);">
                                        <li><a href="javascript:void(0)" onclick="exportFilter('excel')">Excel</a></li>
                                        <li><a href="javascript:void(0)" onclick="exportFilter('pdf')">PDF</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped card-table text-nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Ref.</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>ENTRY</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($transaction->ref); ?></td>
                                    <td><?php echo e($transaction->product->name); ?></td>
                                    <td><?php echo e($transaction->amount); ?></td>
                                    <td><?php echo e($transaction->created_at->format('d/m/Y')); ?></td>
                                    <td><a href="<?php echo e(route('user.transaction.show', $transaction->uid)); ?>" target="_blank">View</a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(!$transactions->count()): ?>
                        <p class="text-center mt-4">No records found</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row End-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <?php echo $__env->make('layouts.scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--Moment js-->
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
    <!-- Daterangepicker js-->
    <script src="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <script>
        $(document).ready(function(){
            $('#from, #to').datepicker();
        });

        function exportFilter(type)
        {
            window.location = "export/"+type+"/<?php echo e($from); ?>/to/<?php echo e($to); ?>/";
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/user/transaction/filter.blade.php ENDPATH**/ ?>