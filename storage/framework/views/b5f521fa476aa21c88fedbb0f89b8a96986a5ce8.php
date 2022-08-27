<?php
    $todos = \App\Models\Transaction::whereUserId(auth()->id())->orderBy('id','desc')->get();
?>
<div class="sidebar sidebar-right sidebar-animate ps ps--active-y">
	<div class="tab-menu-heading siderbar-tabs border-0">
		<div class="tabs-menu ">
			<!-- Tabs -->
			<ul class="nav panel-tabs">
				<li>
					<a href="#tab2" data-toggle="tab" class="active" data-toggle="tab">Todo</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
		<div class="tab-content border-top">
			<div class="tab-pane active" id="tab2">
				<div class="">
					<?php if($todos->count() > 0): ?>
						<?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="list d-flex align-items-center border-bottom p-4">
								<div class="img_cont">
									<img src="<?php echo e($todo->user->passport); ?>" class="avatar bg-primary br-3 mr-3 avatar-md" alt="passport">
									
								</div>
								<div class="wrapper w-100 ml-3">
									<p class="mb-0 d-flex"> <b>You have not confirmed the delivery of your package with tracking number <?php echo e($todo->tracking_code); ?></b></p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center">
											<i class="mdi mdi-clock text-muted mr-1"></i>
											<small class="text-muted ml-auto"><?php echo e($todo->updated_at->diffForHumans()); ?></small>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<div class="text-center pt-5">
							
						</div>
					<?php else: ?>
						<div class="d-flex bd-highlight">
							<div class="user_info">
								<h6 class="mt-3 mb-0">There are no actions required on your account</h6>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End Rightsidebar-->
	</div>
	<!-- End app-content-->
</div>
<?php /**PATH C:\xampp\htdocs\fnbi\resources\views/layouts/menu/customer_rightbar.blade.php ENDPATH**/ ?>