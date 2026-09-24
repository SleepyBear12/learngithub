@extends('layouts.pengguna')

@section('content')

    <div class="welcome-text">
        <small>Selamat datang kembali</small>
        <h1>{{ auth()->user()->nama ?? 'Pengguna' }}</h1>
    </div>

    <form class="search-box" method="GET" action="{{ route('pengguna.dashboard') }}">
        <i class="bi bi-search"></i>

        <input type="text"
               name="q"
               value="{{ $search }}"
               placeholder="Cari charging station..."
               aria-label="Cari charging station">
    </form>

    @if ($sesiAktif)
    <div class="charging-card">

        <div class="charging-header">
            <div class="charging-title">
                <i class="bi bi-lightning-charge-fill me-1"></i>
                Charging Aktif
            </div>

            <div class="charging-status">
                <i class="bi bi-circle-fill"></i>
                {{ ucfirst($sesiAktif->status) }}
            </div>
        </div>

        <div class="charging-progress">

            <div class="progress-label">
                <span>{{ $sesiAktif->pengisiDaya?->lokasi?->nama_lokasi ?? 'Lokasi tidak tersedia' }}</span>
                <strong>{{ number_format($sesiAktif->energi_kwh, 1, ',', '.') }} kWh</strong>
            </div>

            <div class="progress">
                <div class="progress-bar"
                     style="width: 100%">
                </div>
            </div>

        </div>

        <div class="charging-info">

            <div class="charging-info-item">
                <small>Energi</small>
                <strong>{{ number_format($sesiAktif->energi_kwh, 1, ',', '.') }} kWh</strong>
            </div>

            <div class="charging-info-item">
                <small>Durasi</small>
                <strong>{{ $sesiAktif->durasi }} Menit</strong>
            </div>

            <div class="charging-info-item">
                <small>Biaya</small>
                <strong>Rp{{ number_format($sesiAktif->biaya, 0, ',', '.') }}</strong>
            </div>

        </div>

        <button class="btn-stop" type="button" disabled>
            <i class="bi bi-lightning-charge me-1"></i>
            Sedang berlangsung
        </button>

    </div>
    @else
    <div class="empty-state">
        <i class="bi bi-battery-charging"></i>
        <strong>Belum ada charging aktif</strong>
        <span>Mulai sesi dari charging station pilihan Anda.</span>
    </div>
    @endif


    <div class="section-header">

        <h2>Akses Cepat</h2>

    </div>


    <div class="quick-menu">

        <a href="{{ url('/pengguna/station') }}"
           class="quick-item">

            <div class="quick-icon">
                <i class="bi bi-geo-alt-fill"></i>
            </div>

            <span>Cari Station</span>

        </a>


        <a href="{{ url('/pengguna/reservasi') }}"
           class="quick-item">

            <div class="quick-icon">
                <i class="bi bi-calendar-check-fill"></i>
            </div>

            <span>Reservasi</span>

        </a>


        <a href="{{ url('/pengguna/pembayaran') }}"
           class="quick-item">

            <div class="quick-icon">
                <i class="bi bi-credit-card-fill"></i>
            </div>

            <span>Pembayaran</span>

        </a>


        <a href="{{ url('/pengguna/pengaduan') }}"
           class="quick-item">

            <div class="quick-icon">
                <i class="bi bi-chat-left-text-fill"></i>
            </div>

            <span>Pengaduan</span>

        </a>

    </div>


    <div class="section-header">

        <h2>Charging Station Terdekat</h2>

        <a href="{{ url('/pengguna/station') }}">
            Lihat Semua
        </a>

    </div>


    @forelse ($stasiun as $station)
    <div class="station-card">

        <div class="station-top">

            <div class="station-info">

                <div class="station-icon">
                    <i class="bi bi-ev-front-fill"></i>
                </div>

                <div>

                    <div class="station-name">
                        {{ $station->nama_lokasi }}
                    </div>

                    <div class="station-location">
                        {{ $station->alamat }}
                    </div>

                </div>

            </div>

            <div class="station-distance">
                {{ $station->status === 'aktif' ? 'Buka' : 'Tutup sementara' }}
            </div>

        </div>


        <div class="station-bottom">

            <div>

                <div class="station-status">
                    <i class="bi bi-circle-fill"></i>
                    {{ $station->charger_tersedia_count }} Charger tersedia
                </div>

                <div class="station-price">
                    Mulai <strong>Rp{{ number_format($station->tarif->first()?->harga_per_kwh ?? 0, 0, ',', '.') }}/kWh</strong>
                </div>

            </div>

            <a href="{{ url('/pengguna/station/'.$station->id_lokasi) }}"
               class="btn-detail">

                Detail

            </a>

        </div>

    </div>
    @empty
    <div class="empty-state">
        <i class="bi bi-geo-alt"></i>
        <strong>{{ $search ? 'Station tidak ditemukan' : 'Belum ada charging station' }}</strong>
        <span>{{ $search ? 'Coba gunakan nama atau alamat lain.' : 'Data station akan tampil setelah ditambahkan.' }}</span>
    </div>
    @endforelse

@endsection