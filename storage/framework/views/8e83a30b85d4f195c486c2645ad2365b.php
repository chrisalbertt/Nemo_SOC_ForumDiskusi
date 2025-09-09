<?php $__env->startSection('title','Kelola Users'); ?>

<?php $__env->startSection('content'); ?>
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola Users</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Users</h5>
      <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary btn-sm"><i class="bi bi-person-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
      <?php if(session('ok')): ?> <div class="alert alert-success"><?php echo e(session('ok')); ?></div> <?php endif; ?>
      <?php if(session('err')): ?> <div class="alert alert-danger"><?php echo e(session('err')); ?></div> <?php endif; ?>

      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($u->id_users); ?></td>
              <td><?php echo e($u->nama_lengkap); ?></td>
              <td><?php echo e($u->username); ?></td>
              <td><?php echo e($u->role); ?></td>
              <td>
                <a href="<?php echo e(route('admin.users.edit',$u->id_users)); ?>" class="btn btn-sm btn-warning me-1">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <form method="POST" action="<?php echo e(route('admin.users.destroy',$u->id_users)); ?>" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
                  <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      <?php if(method_exists($users,'links')): ?>
        <?php echo e($users->links()); ?>

      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\nemosoc\resources\views/admin/users/index.blade.php ENDPATH**/ ?>