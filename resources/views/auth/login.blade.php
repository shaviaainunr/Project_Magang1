<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SCG ReadyMix Plant Cirebon</title>
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
    <div class="login-card">
        <div class="login-logo">
    <img src="{{ asset('img/SCGori.png') }}" alt="SCG Logo">
</div>
        <h4 class="login-title">Selamat Datang 👋</h4>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>

                <div class="password-wrapper">
                    <input type="password" id="password" name="password" 
                        class="form-control" placeholder="Masukkan password" required>

                    <i class="fa-solid fa-eye toggle-eye" id="togglePassword"></i>
                </div>
            </div>

            @error('email')
                <div class="text-danger mb-2 text-center">{{ $message }}</div>
            @enderror

        <div class="mb-3">
            <label class="form-label">Captcha</label>

            <div class="captcha-wrapper">
                <span id="captchaQuestion"></span>
                <input type="number" id="captchaAnswer" class="form-control"
                    placeholder="Jawaban captcha">
            </div>
        </div>


            <button type="submit" class="btn btn-login w-100 mt-3 py-2">Masuk</button>
        </form>
        <div class="text-center mt-3">
            <p>Belum punya akun? <a href="{{ route('register') }}">Buat Akun</a></p>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} Sistem Informasi SRMI Plant Cirebon | Cr. Shavia Ainun
    </footer>
</body>
</html>
<script>
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
</script>
<script>
    let num1, num2, correctAnswer, operator;

    function generateCaptcha() {
        const operators = ['+', '-', '×', '÷'];
        operator = operators[Math.floor(Math.random() * operators.length)];

        if (operator === '+') {
            num1 = Math.floor(Math.random() * 10) + 1;
            num2 = Math.floor(Math.random() * 10) + 1;
            correctAnswer = num1 + num2;
        } 
        else if (operator === '-') {
            num1 = Math.floor(Math.random() * 10) + 1;
            num2 = Math.floor(Math.random() * num1) + 1;
            correctAnswer = num1 - num2;
        } 
        else if (operator === '×') {
            num1 = Math.floor(Math.random() * 10) + 1;
            num2 = Math.floor(Math.random() * 10) + 1;
            correctAnswer = num1 * num2;
        } 
        else {
            num2 = Math.floor(Math.random() * 9) + 1;
            correctAnswer = Math.floor(Math.random() * 10) + 1;
            num1 = num2 * correctAnswer;
        }

        document.getElementById('captchaQuestion').innerText =
            `${num1} ${operator} ${num2} = ?`;

        document.getElementById('captchaError').classList.add('d-none');
    }

    generateCaptcha();

    document.querySelector('form').addEventListener('submit', function (e) {
        const input = document.getElementById('captchaAnswer');
        const value = input.value.trim();

        // ✅ KOSONG → BIARKAN FORM SUBMIT (SERVER VALIDASI)
        if (value === '') {
            document.getElementById('captchaError').classList.add('d-none');
            return;
        }

        // ❌ SALAH → TAMPILKAN ERROR
        if (parseInt(value) !== correctAnswer) {
            e.preventDefault();
            document.getElementById('captchaError').classList.remove('d-none');
            generateCaptcha();
            input.value = '';
        }
    });
</script>

