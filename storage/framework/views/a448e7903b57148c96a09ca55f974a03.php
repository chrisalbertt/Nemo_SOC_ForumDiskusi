<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $__env->yieldContent('title','Nemo Forum'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body{display:flex;min-height:100vh;flex-direction:column;background:#f8fafc}
    .navbar{background:linear-gradient(90deg,#374151,#1f2937)}
    .navbar .navbar-brand{color:#fff;font-weight:700}
    .wrapper{flex:1;display:flex}
    .sidebar{width:240px;background:linear-gradient(180deg,#4b5563,#1f2937);color:#e5e7eb;flex-shrink:0}
    .sidebar-header{padding:18px 20px;font-size:1.1rem;font-weight:700;background:rgba(255,255,255,.08);border-bottom:1px solid rgba(255,255,255,.15);text-align:center}
    .nav-link-side{display:flex;align-items:center;gap:10px;padding:12px 18px;color:#e5e7eb;text-decoration:none;border-left:4px solid transparent;transition:all .2s}
    .nav-link-side:hover{background:rgba(255,255,255,.14);color:#fff;border-left:4px solid #9ca3af;transform:translateX(2px)}
    .nav-link-side.active{background:rgba(255,255,255,.22);color:#fff;border-left:4px solid #9ca3af;font-weight:700}
    .content{flex:1;padding:24px}
  </style>
</head>
<body>
  <nav class="navbar navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/user/forum">Nemo Forum</a>
      <div>
        <a href="/logout" class="btn btn-sm btn-light text-dark">
          <i class="bi bi-box-arrow-right me-1"></i>Logout
        </a>
      </div>
    </div>
  </nav>

  <div class="wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">Dashboard</div>

      <a class="nav-link-side <?php echo e(request()->is('dashboard') || request()->is('user/forum') ? 'active' : ''); ?>"
         href="/user/forum">
        <i class="bi bi-house-door"></i> Dashboard
      </a>

      <a class="nav-link-side <?php echo e(request()->is('user/forum/create') ? 'active' : ''); ?>"
         href="/user/forum/create">
        <i class="bi bi-plus-square"></i> Tulis Topik
      </a>
    </aside>

    <!-- Content -->
    <main class="content">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>
</body>
</html>
<?php /**PATH C:\Users\ASUS\nemosoc\resources\views/layouts/main-user.blade.php ENDPATH**/ ?>