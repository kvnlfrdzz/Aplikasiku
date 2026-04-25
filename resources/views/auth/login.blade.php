<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background:#f5f5f5;">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <div class="card shadow" style="width:400px;">
        <div class="card-body">

            <h4 class="text-center mb-4">Login</h4>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>

                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>

                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-primary btn-block">
                    Login
                </button>

                {{-- REGISTER --}}
                <div class="text-center mt-3">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Register</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>