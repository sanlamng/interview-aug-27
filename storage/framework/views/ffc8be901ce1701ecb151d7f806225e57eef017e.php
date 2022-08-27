<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('layouts.styles.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><!--Daterangepicker css-->
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
                            <div class="form-group  col-md-4 col-xs-12">
                                <label for="from">From Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="from" type="text" name="from" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label for="to">To Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input id="to" type="text" name="to" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Filter</button>
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
	                    </table>
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
            $('table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '<?php echo e(route('user.transaction.index')); ?>',
                order: [3, 'asc'],
                columns: [
                    {data: 'uid', name: 'uid'},
                    {data: 'product_id', name: 'product_id'},
                    {data: 'amount_paid', name: 'amount_paid'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                ],
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [4]
                    }
                ]
            });

            $('#from, #to').datepicker();
        });

        function exportFilter(type)
        {
            let url_segment = window.location.href.split('/');
            let filter = url_segment[url_segment.length-1];
            let sorter = filter.replace('manifests', '');
            window.location = url+sorter;
        }

        function isNotEmpty(elm){
            if(elm.val() === ''){
                elm.css('border-color', 'red');
                return false;
            }
            return true;
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fnbi\resources\views/user/transaction/index.blade.php ENDPATH**/ ?>