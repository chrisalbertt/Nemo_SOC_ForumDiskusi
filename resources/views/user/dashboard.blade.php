@extends('layouts.user')
@section('title','Dashboard User')

@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Dashboard</h5></div>
  <div class="card-body">
    <p>Halo, <strong>{{ session('nama') }}</strong>! Selamat datang di forum diskusi sederhana.</p>
    <a href="{{ route('forum.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-chat-dots"></i> Ke Forum</a>
  </div>
</div>
@endsection
