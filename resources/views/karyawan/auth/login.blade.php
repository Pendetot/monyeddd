<!-- resources/views/karyawan/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Karyawan Login</title>
</head>
<body>
    <h2>Karyawan Login</h2>
    <form method="POST" action="{{ route('karyawan.login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
