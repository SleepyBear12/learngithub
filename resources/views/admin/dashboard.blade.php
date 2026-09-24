@extends('layouts.admin')

@section('content')
    <div class="dashboard-card">
        <div class="d-flex justify-content-between align-items-start gap-3">
            <div>
                <p class="text-uppercase text-secondary small fw-semibold mb-2">Ringkasan hari ini</p>
                <h2 class="h4 mb-2">Selamat datang, {{ auth()->user()->nama }}</h2>
                <p class="text-secondary mb-0">Dashboard admin berhasil terhubung dengan autentikasi pengguna.</p>
            </div>
            <span class="badge text-bg-primary">ADMIN</span>
        </div>
    </div>
@endsection
