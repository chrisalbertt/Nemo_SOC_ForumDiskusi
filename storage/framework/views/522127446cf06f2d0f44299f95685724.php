<?php $__env->startSection('title','Kelola Topik'); ?>

<?php $__env->startSection('content'); ?>
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.topics.index')); ?>">Kelola Topik</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola</li>
    </ol>
  </nav>

  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-0"><?php echo e($topik->Judul); ?></h5>
        <small class="text-muted">oleh <?php echo e($topik->username); ?></small>
      </div>
      <form method="POST" action="<?php echo e(route('admin.topics.destroy',$topik->id_topik)); ?>">
        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
        <button class="btn btn-sm btn-danger">Hapus Topik</button>
      </form>
    </div>
    <div class="card-body">
      <p class="mb-0"><?php echo e($topik->Isi); ?></p>
    </div>
  </div>

  <div class="card">
    <div class="card-header"><h6 class="mb-0">Komentar</h6></div>
    <div class="card-body">
      <?php $__empty_1 = true; $__currentLoopData = $topik->komens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="border rounded p-2 mb-2">
          <strong><?php echo e($k->username); ?></strong><br>
          <?php echo e($k->Isi); ?>

          <form method="POST" action="<?php echo e(route('admin.comments.destroy',$k->id_komen)); ?>" class="mt-1">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="btn btn-sm btn-outline-danger">Hapus Komentar</button>
          </form>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">Belum ada komentar.</p>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/admin/topics/manage.blade.php ENDPATH**/ ?>