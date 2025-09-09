@extends('layouts.user')
@section('title','Edit Topik')

@section('content')
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('forum.index') }}">Forum</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Topik</li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-header"><h5 class="mb-0">Edit Topik</h5></div>
    <div class="card-body">
      <form method="POST" action="{{ route('forum.update',$topik->id_topik) }}">@csrf @method('PUT')
        <div class="mb-2">
          <label>Judul</label>
          <input name="Judul" class="form-control" value="{{ $topik->Judul }}" required>
        </div>
        <div class="mb-3">
          <label>Isi</label>
          <textarea name="Isi" rows="5" class="form-control" required>{{ $topik->Isi }}</textarea>
        </div>

        <div class="d-flex justify-content-start">
          <a href="{{ route('forum.show',$topik->id_topik) }}" class="btn btn-secondary me-2">Batal</a>
          <button class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
@endsection
