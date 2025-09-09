@extends('layouts.admin')
@section('title','Tambah Admin')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Kelola Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Tambah Admin</h5></div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="mb-2">
          <label class="form-label">Nama Lengkap</label>
          <input name="nama_lengkap" class="form-control" required>
        </div>

        <div class="mb-2">
          <label class="form-label">Username</label>
          <input name="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mt-3">
          <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary ms-2">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
