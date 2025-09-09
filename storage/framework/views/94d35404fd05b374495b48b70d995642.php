<?php $__env->startSection('title','Dashboard User'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header"><h5 class="mb-0">Dashboard</h5></div>
  <div class="card-body">
    <p>Halo, <strong><?php echo e(session('nama')); ?></strong>! Selamat datang di forum diskusi sederhana.</p>
    <a href="<?php echo e(route('forum.index')); ?>" class="btn btn-primary btn-sm"><i class="bi bi-chat-dots"></i> Ke Forum</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/user/dashboard.blade.php ENDPATH**/ ?>