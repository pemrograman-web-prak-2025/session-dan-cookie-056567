<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 95%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
        p {
            margin-top: 15px;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }

        /* --- STYLES BARU UNTUK REMEMBER ME --- */
        .remember-me-container {
            text-align: left; 
            margin-top: 10px; 
            margin-bottom: 15px; 
            width: 95%; 
            margin-left: auto; 
            margin-right: auto;
        }
        .remember-me-container label {
            font-size: 14px;
            color: #555;
            vertical-align: middle;
        }
        .remember-me-container input[type="checkbox"] {
            width: auto; /* Mengatur lebar kembali normal untuk checkbox */
            margin-right: 5px;
            vertical-align: middle;
            padding: 0; /* Hapus padding input normal */
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login Admin</h2>
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <form action="/admin/login" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <div class="remember-me-container">
                <input type="checkbox" name="remember_me" id="remember_me">
                <label for="remember_me">Ingat Saya</label>
            </div>
            
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="/admin/register">Daftar di sini</a></p>
    </div>
</body>
</html>
