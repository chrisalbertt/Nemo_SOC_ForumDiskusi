<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register – Web Forum Diskusi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body{display:flex;align-items:center;justify-content:center;min-height:100vh;background:linear-gradient(135deg,#d1d5db,#9ca3af);font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;color:#111827;}
    main{width:100%;max-width:360px;}
    article{padding:1.2rem;border-radius:10px;background:#f3f4f6;box-shadow:0 6px 16px rgba(0,0,0,.15);animation:fadeIn .5s ease-out;}
    h2{text-align:center;margin-bottom:1rem;font-weight:700;font-size:1.1rem;color:#1f2937;letter-spacing:.5px;}
    label{font-size:.85rem;font-weight:500;color:#374151;}
    input{background:#fff;border:1px solid #d1d5db;color:#111;width:100%;border-radius:6px;padding:.55rem;font-size:.9rem;transition:all .3s ease;margin-bottom:.8rem;box-sizing:border-box;}
    input:focus{border-color:#2563eb;box-shadow:0 0 6px rgba(37,99,235,.4);outline:none;}
    button{width:100%;background:linear-gradient(135deg,#3b82f6,#2563eb);border:none;border-radius:6px;padding:.6rem;color:#fff;font-weight:600;font-size:.95rem;cursor:pointer;transition:all .25s ease;}
    button:hover{background:linear-gradient(135deg,#2563eb,#1d4ed8);transform:translateY(-2px);box-shadow:0 4px 10px rgba(37,99,235,.3);}
    .subnote{margin-top:.7rem;border-top:1px solid #d1d5db;padding-top:.6rem;text-align:center;}
    .subnote a{color:#1f2937;text-decoration:none;font-weight:600;}
    .subnote a:hover{text-decoration:underline;}
    p.note{text-align:center;margin-top:1rem;font-size:.85rem;font-weight:600;color:#1f2937;letter-spacing:.5px;}
    @keyframes fadeIn{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
    .alert{background:#fee2e2;border:1px solid #fca5a5;color:#991b1b;padding:.5rem .7rem;border-radius:6px;margin-bottom:.6rem;font-size:.9rem;}
    .alert-success{background:#dcfce7;border-color:#86efac;color:#166534;}
  </style>
</head>
<body>
<main>

  @if($errors->any()) <div class="alert">{{ $errors->first() }}</div> @endif
  @if(session('ok'))  <div class="alert alert-success">{{ session('ok') }}</div> @endif

  <article>
    <h2>WEB FORUM DISKUSI — Register</h2>

    <form method="POST" action="{{ route('register.post') }}">
      @csrf
      <label for="nama_lengkap">Nama Lengkap</label>
      <input id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>

      <label for="username">Username</label>
      <input id="username" name="username" value="{{ old('username') }}" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Daftar</button>
    </form>

    <div class="subnote">
      <a href="{{ route('login') }}">Sudah punya akun? Login</a>
    </div>
  </article>

  <p class="note">@2025</p>
</main>
</body>
</html>
