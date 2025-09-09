<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun – Nemo Forum</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{display:flex;align-items:center;justify-content:center;min-height:100vh;
         background:linear-gradient(135deg,#d1d5db,#9ca3af);font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;color:#111827}
    main{width:100%;max-width:420px}
    article{padding:1.4rem 1.6rem;border-radius:12px;background:#f3f4f6;box-shadow:0 10px 28px rgba(0,0,0,.18);animation:fadeIn .5s ease-out}
    h2{text-align:center;margin-bottom:1rem;font-weight:700;font-size:1.35rem;color:#1f2937;letter-spacing:.4px}
    label{display:block;margin-bottom:.35rem;font-size:.9rem;font-weight:600;color:#374151}
    input{background:#fff;border:1px solid #d1d5db;color:#111;width:100%;border-radius:8px;padding:.6rem .7rem;font-size:.95rem;transition:all .25s ease;margin-bottom:.95rem;box-sizing:border-box}
    input:focus{border-color:#3b82f6;box-shadow:0 0 6px rgba(59,130,246,.35);outline:none}

    /* role info readonly */
    .readonly{background:#eef2ff;border-color:#c7d2fe;color:#1e3a8a;font-weight:600}

    /* tombol biru */
    button{width:100%;background:linear-gradient(135deg,#3b82f6,#2563eb);border:none;border-radius:8px;padding:.7rem;color:#fff;font-weight:600;font-size:1rem;cursor:pointer;transition:all .25s ease}
    button:hover{background:linear-gradient(135deg,#2563eb,#1d4ed8);transform:translateY(-2px);box-shadow:0 6px 14px rgba(37,99,235,.3)}

    .alt{text-align:center;margin-top:.9rem;font-size:.92rem}
    .alt a{color:#1d4ed8;text-decoration:none}

    .alert{padding:.6rem .8rem;border-radius:.5rem;margin-bottom:.9rem}
    .alert-danger{background:#fee2e2;color:#991b1b}
    .alert-success{background:#dcfce7;color:#065f46}

    @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
  </style>
</head>
<body>
<main>
  <article>
    <h2>DAFTAR AKUN</h2>

    <?php if(session('err')): ?> <div class="alert alert-danger"><?php echo e(session('err')); ?></div> <?php endif; ?>
    <?php if(session('msg')): ?> <div class="alert alert-success"><?php echo e(session('msg')); ?></div> <?php endif; ?>

    <form method="POST" action="/register">
      <?php echo csrf_field(); ?>

      <label>Role</label>
      <input class="readonly" value="user" readonly disabled>

      <label for="name">Nama</label>
      <input id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="" required>

      <label for="username">Username</label>
      <input id="username" name="username" value="<?php echo e(old('username')); ?>" placeholder="" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="" required>

      <button type="submit">Daftar</button>
    </form>

    <div class="alt">Sudah punya akun? <a href="/login">Masuk</a></div>
  </article>
</main>
</body>
</html>
<?php /**PATH C:\Users\ASUS\nemosoc\resources\views/register/index.blade.php ENDPATH**/ ?>