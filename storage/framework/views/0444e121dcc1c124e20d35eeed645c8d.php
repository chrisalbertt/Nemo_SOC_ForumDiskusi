<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title','Forum User'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{display:flex;min-height:100vh;flex-direction:column;background:#ffffff;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;}
    .wrapper{flex:1;display:flex;}
    .sidebar{width:240px;color:#fff;flex-shrink:0;display:flex;flex-direction:column;background:linear-gradient(180deg,#4b5563,#1f2937);box-shadow:2px 0 10px rgba(0,0,0,.05);}
    .sidebar-header{padding:20px;font-size:1.2rem;font-weight:700;text-align:center;background:rgba(255,255,255,.08);border-bottom:1px solid rgba(255,255,255,.2);}
    .sidebar a{display:flex;align-items:center;gap:12px;padding:12px 20px;color:#e5e7eb;text-decoration:none;font-size:15px;border-left:4px solid transparent;transition:all .3s ease;}
    .sidebar a:hover{background:rgba(255,255,255,.15);color:#fff;border-left-color:#9ca3af;transform:translateX(3px);}
    .sidebar a.active{background:rgba(255,255,255,.25);color:#fff;font-weight:700;border-left-color:#9ca3af;}
    .content{flex-grow:1;padding:24px;background:#fff;animation:fadeIn .4s ease-in-out;}
    .navbar{background:linear-gradient(90deg,#374151,#1f2937);box-shadow:0 2px 6px rgba(0,0,0,.1);}
    footer{background:linear-gradient(90deg,#374151,#1f2937);color:#d1d5db;font-size:.9rem;}
    @keyframes fadeIn{from{opacity:0;transform:translateY(8px);}to{opacity:1;transform:translateY(0);}}
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
  
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="<?php echo e(route('forum.index')); ?>">User</a>
      <div class="d-flex ms-auto">
        <span class="text-white-50 small me-2"><?php echo e(session('username')); ?></span>
        <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
          <button type="submit" class="btn btn-sm btn-light text-dark fw-semibold">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </nav>

  <div class="wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">Menu</div>
      <a href="<?php echo e(route('user.dashboard')); ?>" class="<?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
      <a href="<?php echo e(route('forum.index')); ?>" class="<?php echo e(request()->routeIs('forum.*') ? 'active' : ''); ?>">
        <i class="bi bi-chat-dots"></i> Forum
      </a>
    </aside>

    <!-- Content -->
    <main class="content flex-grow-1">
      <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>

  
  <footer class="text-center py-3 mt-auto">
    <div class="container">
      <small>&copy; <?php echo e(date('Y')); ?> All rights reserved.</small>
    </div>
  </footer>
</body>
</html>
<?php /**PATH C:\Users\ASUS\nemosoc\resources\views/layouts/user.blade.php ENDPATH**/ ?>