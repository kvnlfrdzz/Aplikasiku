<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: #eef1f5;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .btn {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <h3 class="mb-4">@yield('title')</h3>

    @yield('content')

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>