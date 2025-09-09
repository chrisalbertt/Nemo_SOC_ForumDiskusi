@extends('layouts.admin')
@section('title','Kelola Topik')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.topics.index') }}">Kelola Topik</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola</li>
    </ol>
  </nav>

  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-0">{{ $topik->Judul }}</h5>
        <small class="text-muted">oleh {{ $topik->username }}</small>
      </div>
      <form method="POST" action="{{ route('admin.topics.destroy',$topik->id_topik) }}">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Hapus Topik</button>
      </form>
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
          <form method="POST" action="{{ route('admin.comments.destroy',$k->id_komen) }}" class="mt-1">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Hapus Komentar</button>
          </form>
        </div>
      @empty
        <p class="text-muted">Belum ada komentar.</p>
      @endforelse
    </div>
  </div>
@endsection
