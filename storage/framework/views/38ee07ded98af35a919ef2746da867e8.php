<?php $__env->startSection('title','Forum Diskusi'); ?>

<?php $__env->startSection('content'); ?>
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Forum</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Informasi Topik</h5>
      <a href="<?php echo e(route('forum.create')); ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus"></i> Buat Topik
      </a>
    </div>
    <div class="card-body">
      <?php if(session('ok')): ?>  <div class="alert alert-success"><?php echo e(session('ok')); ?></div> <?php endif; ?>
      <?php if(session('err')): ?> <div class="alert alert-danger"><?php echo e(session('err')); ?></div> <?php endif; ?>

      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>Judul</th>
            <th>Pembuat</th>
            <th>Komentar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><a href="<?php echo e(route('forum.show',$t->id_topik)); ?>"><?php echo e($t->Judul); ?></a></td>
              <td><?php echo e($t->username); ?></td>
              <td><?php echo e($t->komens_count); ?></td>
              <td>
                <?php if(session('role') === 'ADMIN' || session('user_id') == $t->id_user): ?>
                  <a href="<?php echo e(route('forum.edit',$t->id_topik)); ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                  <form method="POST" action="<?php echo e(route('forum.destroy',$t->id_topik)); ?>" class="d-inline"
                        onsubmit="return confirm('Hapus topik ini?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                <?php else: ?>
                  <span class="text-muted">—</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4" class="text-center">Belum ada topik diposting.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <?php if(method_exists($topics,'links')): ?>
        <?php echo e($topics->links()); ?>

      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/user/forum/index.blade.php ENDPATH**/ ?>