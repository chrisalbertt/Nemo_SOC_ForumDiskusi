@extends('layouts.admin')
@section('title','Kelola Users')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola Users</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Daftar Users</h5>
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-person-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
      @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif
      @if(session('err')) <div class="alert alert-danger">{{ session('err') }}</div> @endif

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
          @foreach($users as $u)
            <tr>
              <td>{{ $u->id_users }}</td>
              <td>{{ $u->nama_lengkap }}</td>
              <td>{{ $u->username }}</td>
              <td>{{ $u->role }}</td>
              <td>
                <a href="{{ route('admin.users.edit',$u->id_users) }}" class="btn btn-sm btn-warning me-1">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <form method="POST" action="{{ route('admin.users.destroy',$u->id_users) }}" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      @if(method_exists($users,'links'))
        {{ $users->links() }}
      @endif
    </div>
  </div>
@endsection
