<x-guest-layout>
    <div class="auth-shell">
        <section class="auth-intro">
            <a class="brand-mark" href="{{ url('/') }}"><span><i class="bi bi-lightning-charge-fill"></i></span> EVChargeHub</a>
            <div class="intro-copy">
                <div class="eyebrow"><span></span> Ekosistem charging pintar</div>
                <h1>Satu akses untuk<br><em>mobilitas tanpa batas.</em></h1>
                <p>Kelola perjalanan, operasional, dan energi kendaraan listrik dari satu ruang kerja yang terhubung.</p>
            </div>
            <div class="stakeholder-preview">
                <small>DIRANCANG UNTUK</small>
                <div><span><i class="bi bi-shield-check"></i> Admin</span><span><i class="bi bi-person-badge"></i> Operator</span><span><i class="bi bi-car-front"></i> Pengemudi</span></div>
            </div>
            <div class="orb orb-one"></div><div class="orb orb-two"></div>
        </section>

        <section class="auth-panel">
            <div class="mobile-brand"><a class="brand-mark" href="{{ url('/') }}"><span><i class="bi bi-lightning-charge-fill"></i></span> EVChargeHub</a></div>
            <div class="auth-heading"><div class="auth-icon"><i class="bi bi-arrow-right"></i></div><small>SELAMAT DATANG KEMBALI</small><h2>Masuk ke akun Anda</h2><p>Gunakan email dan kata sandi akun Anda.</p></div>
            <x-auth-session-status class="auth-status" :status="session('status')" />
            @if ($errors->any())<div class="auth-alert">{{ $errors->first() }}</div>@endif
            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf
                <label class="field-label" for="email">Email</label>
                <div class="input-wrap"><i class="bi bi-envelope"></i><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com" required autofocus autocomplete="username"></div>
                <label class="field-label" for="password">Kata sandi</label>
                <div class="input-wrap"><i class="bi bi-lock"></i><input id="password" type="password" name="password" placeholder="Masukkan kata sandi" required autocomplete="current-password"><button type="button" class="password-toggle" onclick="togglePassword('password', this)"><i class="bi bi-eye"></i></button></div>
                <div class="form-options"><label><input type="checkbox" name="remember"> <span>Ingat saya</span></label><a href="{{ route('password.request') }}">Lupa kata sandi?</a></div>
                <button class="submit-button" type="submit">Masuk ke dashboard <i class="bi bi-arrow-up-right"></i></button>
            </form>
            <p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
        </section>
    </div>
    <script>function togglePassword(id, button) { const input = document.getElementById(id); input.type = input.type === 'password' ? 'text' : 'password'; button.innerHTML = input.type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>'; }</script>
</x-guest-layout>
