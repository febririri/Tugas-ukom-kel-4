
@extends('template.template')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="width: 350px;">
        <h3 class="text-center mb-4 text-primary">Login</h3>

    <form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Masuk Sebagai</label>
        <select name="role" class="form-select" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="guru">Guru</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
</form>

    </div>
</div>
@endsection
