<?php $__env->startSection('title','Kelola Topik'); ?>

<?php $__env->startSection('content'); ?>
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola Topik</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Daftar Topik</h5></div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pembuat</th>
            <th>Komentar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td><?php echo e($t->id_topik); ?></td>
              <td><?php echo e($t->Judul); ?></td>
              <td><?php echo e($t->username); ?></td>
              <td><?php echo e($t->komens_count); ?></td>
              <td>
                <a href="<?php echo e(route('admin.topics.manage',$t->id_topik)); ?>" class="btn btn-sm btn-secondary">Kelola</a>
                <form method="POST" action="<?php echo e(route('admin.topics.destroy',$t->id_topik)); ?>" class="d-inline"
                      onsubmit="return confirm('Hapus topik ini?')">
                  <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="text-center">Belum ada topik.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <?php if(method_exists($topics,'links')): ?>
        <?php echo e($topics->links()); ?>

      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/admin/topics/index.blade.php ENDPATH**/ ?>