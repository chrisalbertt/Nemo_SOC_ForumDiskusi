<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nemo Forum</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background:#f6f9fc}
    .sidebar{min-height:100vh}
    .menu-title{font-weight:700;letter-spacing:.3px}
  </style>
</head>
<body>

<?php ($isLogin = request()->routeIs('login')); ?>


<?php if (! ($isLogin)): ?>
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/dashboard">Nemo Forum</a>
    <div class="ms-auto">
      <a class="btn btn-outline-secondary btn-sm" href="/logout">Logout</a>
    </div>
  </div>
</nav>
<?php endif; ?>

<?php if($isLogin): ?>
  
  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <main class="w-100" style="max-width:560px; transform: translateY(-6vh);">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>
<?php else: ?>
  
  <div class="container my-4">
    <div class="row g-4">
      <aside class="col-12 col-md-4 col-lg-3">
        <div class="sidebar bg-white border rounded-3 p-3">
          <div class="mb-3">
            <div class="menu-title mb-2">Menu Admin</div>
            <div class="list-group">
              <a href="/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
              <div class="list-group-item">
                <div class="fw-semibold small text-uppercase text-muted mb-2">KELOLA USER</div>
                <div class="d-flex gap-2">
                  <a class="btn btn-sm btn-outline-primary" href="/admin/kelola_user">Lihat</a>
                  <a class="btn btn-sm btn-primary" href="/admin/kelola_user/create">Tambah</a>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="menu-title mb-2">Menu User</div>
            <div class="list-group">
              <div class="list-group-item">
                <div class="fw-semibold small text-uppercase text-muted mb-2">FORUM</div>
                <div class="d-flex gap-2">
                  <a class="btn btn-sm btn-outline-primary" href="/user/forum">List</a>
                  <a class="btn btn-sm btn-primary" href="/user/forum/create">Tambah</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>

      <main class="col-12 col-md-8 col-lg-9">
        <?php echo $__env->yieldContent('content'); ?>
      </main>
    </div>
  </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\ASUS\nemosoc\resources\views/layouts/app.blade.php ENDPATH**/ ?>