<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f5f5f5;">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">

            <h1 class="mb-3">🚀 Welcome to Blog App</h1>
            <p class="mb-4 text-muted">Silakan login dulu untuk masuk ke dashboard</p>

<div class="d-flex gap-3 justify-content-center">
    <a href="{{ route('login') }}" class="btn btn-primary px-4">
        Login
    </a>
</div>

        </div>
    </div>

</body>
</html>