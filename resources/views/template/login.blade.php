
@extends('template.template')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="width: 350px;">
        <h3 class="text-center mb-4 text-primary">Login</h3>

        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
              <div class="mb-3">
                    <label for="role" class="form-label">Masuk Sebagai</label>
                    <select name="role" id="role" class="form-select" required>
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
