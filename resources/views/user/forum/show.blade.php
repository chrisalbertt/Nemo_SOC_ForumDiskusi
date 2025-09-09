@extends('layouts.user')
@section('title',$topik->Judul)

@section('content')
  {{-- Breadcrumb (opsional, aman ditambah) --}}
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('forum.index') }}">Forum</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ \Illuminate\Support\Str::limit($topik->Judul, 50) }}
      </li>
    </ol>
  </nav>

  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-0">{{ $topik->Judul }}</h5>
        <small class="text-muted">oleh {{ $topik->username }}</small>
      </div>

      {{-- Tampilkan aksi hanya untuk ADMIN atau pemilik topik --}}
      @if(session('role') === 'ADMIN' || (int)session('user_id') === (int)$topik->id_user)
        <div class="d-flex gap-2">
          <a href="{{ route('forum.edit',$topik->id_topik) }}" class="btn btn-sm btn-warning">Edit</a>
          <form method="POST" action="{{ route('forum.destroy',$topik->id_topik) }}"
                class="d-inline" onsubmit="return confirm('Hapus topik ini?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </div>
      @endif
    </div>
    <div class="card-body">
      <p class="mb-0">{{ $topik->Isi }}</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header"><h6 class="mb-0">Komentar</h6></div>
    <div class="card-body">
      @forelse($topik->komens as $k)
        <div class="border rounded p-2 mb-2">
          <strong>{{ $k->username }}</strong><br>
          {{ $k->Isi }}

          {{-- Hapus komentar hanya untuk ADMIN atau pemilik komentar --}}
          @if(session('role') === 'ADMIN' || (int)session('user_id') === (int)$k->id_users)
            <form method="POST" action="{{ route('forum.comment.delete',$k->id_komen) }}"
                  class="mt-1 d-inline" onsubmit="return confirm('Hapus komentar ini?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Hapus</button>
            </form>
          @endif
        </div>
      @empty
        <p class="text-muted">Belum ada komentar.</p>
      @endforelse

      <hr>
      {{-- Semua user login boleh komentar --}}
      <form method="POST" action="{{ route('forum.comment',$topik->id_topik) }}">
        @csrf
        <div class="mb-2">
          <textarea name="Isi" rows="3" class="form-control"
                    placeholder="Tulis komentar..." required></textarea>
        </div>
        <button class="btn btn-primary btn-sm">Kirim</button>
      </form>
    </div>
  </div>
@endsection
