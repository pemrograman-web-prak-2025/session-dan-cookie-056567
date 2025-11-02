<!DOCTYPE html>
<html>
<head>
    <title>Register Admin</title>
    {{-- Menggunakan @vite untuk memuat CSS eksternal --}}
    @vite('resources/css/app.css')
</head>
<body>
    <div class="box">
        <h2>Register Admin</h2>
        <form action="/admin/register" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Ulangi Password" required>

            <button class="btn btn-primary" type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="/admin/login" class="link-success">Login di sini</a></p>
    </div>
</body>
</html>
