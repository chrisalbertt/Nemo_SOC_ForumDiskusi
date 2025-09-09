<?php $__env->startSection('title',$topik->Judul); ?>

<?php $__env->startSection('content'); ?>
  
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('forum.index')); ?>">Forum</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo e(\Illuminate\Support\Str::limit($topik->Judul, 50)); ?>

      </li>
    </ol>
  </nav>

  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-0"><?php echo e($topik->Judul); ?></h5>
        <small class="text-muted">oleh <?php echo e($topik->username); ?></small>
      </div>

      
      <?php if(session('role') === 'ADMIN' || (int)session('user_id') === (int)$topik->id_user): ?>
        <div class="d-flex gap-2">
          <a href="<?php echo e(route('forum.edit',$topik->id_topik)); ?>" class="btn btn-sm btn-warning">Edit</a>
          <form method="POST" action="<?php echo e(route('forum.destroy',$topik->id_topik)); ?>"
                class="d-inline" onsubmit="return confirm('Hapus topik ini?')">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </div>
      <?php endif; ?>
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


          
          <?php if(session('role') === 'ADMIN' || (int)session('user_id') === (int)$k->id_users): ?>
            <form method="POST" action="<?php echo e(route('forum.comment.delete',$k->id_komen)); ?>"
                  class="mt-1 d-inline" onsubmit="return confirm('Hapus komentar ini?')">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">Belum ada komentar.</p>
      <?php endif; ?>

      <hr>
      
      <form method="POST" action="<?php echo e(route('forum.comment',$topik->id_topik)); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-2">
          <textarea name="Isi" rows="3" class="form-control"
                    placeholder="Tulis komentar..." required></textarea>
        </div>
        <button class="btn btn-primary btn-sm">Kirim</button>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/user/forum/show.blade.php ENDPATH**/ ?>