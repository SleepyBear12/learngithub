@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-secondary small fw-semibold mb-2">Kontrol akses</p>
            <h2 class="h4 mb-1">Role & Hak Akses</h2>
            <p class="text-secondary mb-0">Kelola akses tiga stakeholder EVChargeHub.</p>
        </div>
        <button class="btn btn-primary" type="button"><i class="bi bi-plus-lg me-2"></i>Tambah Role</button>
    </div>

    <div class="row g-3">
        @foreach ([['Admin', 'Akses penuh ke seluruh modul', 'bi-shield-lock-fill', '9 hak akses'], ['Operator', 'Mengelola operasional charging', 'bi-person-badge-fill', '5 hak akses'], ['Pengemudi', 'Menggunakan layanan charging', 'bi-car-front-fill', '3 hak akses']] as [$role, $description, $icon, $count])
            <div class="col-md-4">
                <div class="dashboard-card h-100">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div class="rounded-3 p-3 bg-light text-primary"><i class="bi {{ $icon }} fs-4"></i></div>
                        <button class="btn btn-sm btn-light" type="button" aria-label="Edit {{ $role }}"><i class="bi bi-pencil"></i></button>
                    </div>
                    <h3 class="h5 mb-2">{{ $role }}</h3>
                    <p class="text-secondary small mb-3">{{ $description }}</p>
                    <span class="badge rounded-pill text-bg-light">{{ $count }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
