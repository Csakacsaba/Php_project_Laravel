<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="favicon" rel="icon" type="image/png" href="storage/icons/fav.png">
    @vite('resources/css/login.css')
    <title>Login</title>
</head>
<body>
<div >
    <div class="container">
        <a href="{{ route('home') }}" class="back-to-home">Vissza a főoldalra</a>
        <h2>Bejelentkezés</h2>
        <form method="POST" action="{{ route('login.in') }}">
            @csrf
            <div class="errors">
                @csrf
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                @error('email')
                <p>{{ $message }}</p>
                @enderror

                <div>
                    <label for="password">Jelszó:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                @error('password')
                <p>{{ $message }}</p>
                @enderror

                <button type="submit" role="button">Belépés</button>
                <label for="remember">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <button><a href="{{ route('register.page') }}">Regisztráció</a></button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
