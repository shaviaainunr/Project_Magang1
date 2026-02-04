<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SCG ReadyMix Plant Cirebon</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="login-card">  {{-- Menggunakan class yang sama seperti login untuk konsistensi --}}
        <div class="login-logo">
            <img src="{{ asset('img/SCGori.png') }}" alt="SCG Logo">
        </div>
        <h4 class="login-title">Daftar Akun Baru</h4>
        <form action="{{ route('register.post') }}" method="POST">  {{-- Pastikan route ini ada di web.php --}}
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    <i class="fa-solid fa-eye toggle-eye" id="togglePassword"></i>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                    <i class="fa-solid fa-eye toggle-eye" id="toggleConfirmPassword"></i>
                </div>
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-login w-100 mt-3 py-2">Daftar</button>
        </form>
        <div class="text-center mt-3">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Sistem Informasi SRMI Plant Cirebon | Cr. Shavia Ainun
    </footer>
</body>
</html>
<script>
    // Toggle untuk password utama
    document.getElementById('togglePassword').addEventListener('click', function () {
        const pwd = document.getElementById('password');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            pwd.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    // Toggle untuk konfirmasi password
    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const pwdConfirm = document.getElementById('password_confirmation');
        if (pwdConfirm.type === 'password') {
            pwdConfirm.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            pwdConfirm.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>