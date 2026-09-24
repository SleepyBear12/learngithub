@extends('layouts.operator')

@section('content')
    <div class="dashboard-card">
        <p class="text-uppercase text-secondary small fw-semibold mb-2">Workspace operator</p>
        <h2 class="h4 mb-2">Selamat datang, {{ auth()->user()->nama }}</h2>
        <p class="text-secondary mb-0">Dashboard operator berhasil terhubung dengan autentikasi pengguna.</p>
    </div>
@endsection
