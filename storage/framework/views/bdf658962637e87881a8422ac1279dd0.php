<?php $__env->startSection('title','Edit Topik'); ?>

<?php $__env->startSection('content'); ?>
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('forum.index')); ?>">Forum</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Topik</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Edit Topik</h5></div>
    <div class="card-body">
      <form method="POST" action="<?php echo e(route('forum.update',$topik->id_topik)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-2">
          <label>Judul</label>
          <input name="Judul" class="form-control" value="<?php echo e($topik->Judul); ?>" required>
        </div>
        <div class="mb-3">
          <label>Isi</label>
          <textarea name="Isi" rows="5" class="form-control" required><?php echo e($topik->Isi); ?></textarea>
        </div>

        <div class="d-flex justify-content-start">
          <a href="<?php echo e(route('forum.show',$topik->id_topik)); ?>" class="btn btn-secondary me-2">Batal</a>
          <button class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/user/forum/edit.blade.php ENDPATH**/ ?>