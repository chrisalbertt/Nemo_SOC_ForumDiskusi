<?php $__env->startSection('title','Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header"><h5 class="mb-0">Dashboard Admin</h5></div>
  <div class="card-body">
    <p>Halo, <strong><?php echo e(session('nama')); ?></strong>! Ini panel admin.</p>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-dark btn-sm"><i class="bi bi-people"></i> Kelola Users</a>
    <a href="<?php echo e(route('admin.topics.index')); ?>" class="btn btn-secondary btn-sm"><i class="bi bi-chat-square-text"></i> Kelola Topik</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>