@extends('layouts.user')
@section('title','Forum Diskusi')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Forum</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Informasi Topik</h5>
      <a href="{{ route('forum.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus"></i> Buat Topik
      </a>
    </div>
    <div class="card-body">
      @if(session('ok'))  <div class="alert alert-success">{{ session('ok') }}</div> @endif
      @if(session('err')) <div class="alert alert-danger">{{ session('err') }}</div> @endif

      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th>Judul</th>
            <th>Pembuat</th>
            <th>Komentar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($topics as $t)
            <tr>
              <td><a href="{{ route('forum.show',$t->id_topik) }}">{{ $t->Judul }}</a></td>
              <td>{{ $t->username }}</td>
              <td>{{ $t->komens_count }}</td>
              <td>
                @if(session('role') === 'ADMIN' || session('user_id') == $t->id_user)
                  <a href="{{ route('forum.edit',$t->id_topik) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                  <form method="POST" action="{{ route('forum.destroy',$t->id_topik) }}" class="d-inline"
                        onsubmit="return confirm('Hapus topik ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center">Belum ada topik diposting.</td></tr>
          @endforelse
        </tbody>
      </table>

      @if(method_exists($topics,'links'))
        {{ $topics->links() }}
      @endif
    </div>
  </div>
@endsection
