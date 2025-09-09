<?php $__env->startSection('content'); ?>
<div class="card shadow-sm">
  <div class="card-body">
    <h4 class="card-title mb-2">Dashboard</h4>
    <p class="text-muted mb-0">Halo, <span class="fw-semibold"><?php echo e(session('user')['username'] ?? 'guest'); ?></span> 👋</p>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/layouts/main.blade.php ENDPATH**/ ?>