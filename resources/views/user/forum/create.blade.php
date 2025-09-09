@extends('layouts.user')
@section('title','Buat Topik')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('forum.index') }}">Forum</a></li>
      <li class="breadcrumb-item active" aria-current="page">Buat Topik</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Buat Topik</h5></div>
    <div class="card-body">
      <form method="POST" action="{{ route('forum.store') }}">@csrf
        <div class="mb-2">
          <label>Judul</label>
          <input name="Judul" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Isi</label>
          <textarea name="Isi" rows="5" class="form-control" required></textarea>
        </div>

        <div class="d-flex justify-content-start">
          <a href="{{ route('forum.index') }}" class="btn btn-secondary me-2">Batal</a>
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
