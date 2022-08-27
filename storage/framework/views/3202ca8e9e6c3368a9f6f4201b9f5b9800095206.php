<div class="btn-group mt-2 mb-2">
    <button type="button" class="btn btn-pill btn-dark" data-toggle="dropdown">Action</button>
    <button type="button" class="btn btn-pill btn-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(64px, 33px, 0px);">
        <li><a href="<?php echo e(route('user.transaction.export', $transaction->uid)); ?>">Invoice</a></li>
        <li><a href="<?php echo e(route('user.transaction.export', $transaction->uid)); ?>">PDF Label</a></li>
        <li><a href="<?php echo e(route('user.transaction.show', $transaction->uid)); ?>">View</a></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\fnbi\resources\views/layouts/action_buttons/user_transaction.blade.php ENDPATH**/ ?>