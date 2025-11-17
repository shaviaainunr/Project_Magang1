<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Informasi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4f8ef7, #6fc1ff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            width: 380px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 2rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .login-title {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4f8ef7;
            box-shadow: 0 0 5px rgba(79, 142, 247, 0.5);
        }

        .btn-login {
            background: linear-gradient(135deg, #4f8ef7, #6fc1ff);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #3c7ce0, #5ab6fa);
            transform: translateY(-2px);
        }

        .text-danger {
            font-size: 0.875rem;
        }

        footer {
            position: fixed;
            bottom: 15px;
            text-align: center;
            width: 100%;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="login-title">Selamat Datang 👋</h4>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            @error('email')
                <div class="text-danger mb-2 text-center">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-login w-100 mt-3 py-2">Masuk</button>
        </form>
    </div>

    <footer>
        &copy; {{ date('Y') }} Sistem Informasi SRMI Plant Cirebon | Cr. Shavia Ainun
    </footer>
</body>
</html>
