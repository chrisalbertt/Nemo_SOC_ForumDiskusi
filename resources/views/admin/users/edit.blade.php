@extends('layouts.admin')
@section('title','Edit Admin')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Kelola Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Edit Admin</h5></div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.users.update', $user->id_users) }}">
        @csrf @method('PUT')

        <div class="mb-2">
          <label class="form-label">Nama Lengkap</label>
          <input name="nama_lengkap" class="form-control"
                 value="{{ old('nama_lengkap',$user->nama_lengkap) }}" required>
        </div>

        <div class="mb-2">
          <label class="form-label">Username</label>
          <input name="username" class="form-control"
                 value="{{ old('username',$user->username) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password (opsional)</label>
          <input type="password" name="password" class="form-control"
                 placeholder="Kosongkan jika tidak diganti">
        </div>

        {{-- Kolom Role dihapus karena tidak pernah diganti (selalu ADMIN) --}}

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-warning ms-2">Update</button>
      </form>
    </div>
  </div>
@endsection
