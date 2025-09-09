@extends('layouts.admin')
@section('title','Dashboard Admin')

@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Dashboard Admin</h5></div>
  <div class="card-body">
    <p>Halo, <strong>{{ session('nama') }}</strong>! Ini panel admin.</p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-dark btn-sm"><i class="bi bi-people"></i> Kelola Users</a>
    <a href="{{ route('admin.topics.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-chat-square-text"></i> Kelola Topik</a>
  </div>
</div>
@endsection
