{{-- resources/views/admin/topics/index.blade.php --}}
@extends('layouts.admin')
@section('title','Kelola Topik')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
          @forelse($topics as $t)
            <tr>
              <td>{{ $t->id_topik }}</td>
              <td>{{ $t->Judul }}</td>
              <td>{{ $t->username }}</td>
              <td>{{ $t->komens_count }}</td>
              <td>
                <a href="{{ route('admin.topics.manage',$t->id_topik) }}" class="btn btn-sm btn-secondary">Kelola</a>
                <form method="POST" action="{{ route('admin.topics.destroy',$t->id_topik) }}" class="d-inline"
                      onsubmit="return confirm('Hapus topik ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center">Belum ada topik.</td></tr>
          @endforelse
        </tbody>
      </table>

      @if(method_exists($topics,'links'))
        {{ $topics->links() }}
      @endif
    </div>
  </div>
@endsection
