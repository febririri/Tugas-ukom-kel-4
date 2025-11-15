<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center">
    <div class="container mt-5">
        <h1>Selamat Datang di Dashboard 🎉</h1>
        <p>Anda berhasil login sebagai <strong>{{ Auth::user()->name }}</strong></p>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>
