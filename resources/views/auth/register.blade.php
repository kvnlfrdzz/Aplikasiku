<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background:#f5f5f5;">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <div class="card shadow" style="width:400px;">
        <div class="card-body">

            <h4 class="text-center mb-4">Register</h4>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>

                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

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
                </div>

                {{-- CONFIRM --}}
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-success btn-block">
                    Register
                </button>

                {{-- LOGIN --}}
                <div class="text-center mt-3">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>