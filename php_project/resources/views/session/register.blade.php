<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="favicon" rel="icon" type="image/png" href="storage/icons/fav.png">
    @vite('resources/css/login.css')
    <title>Register</title>

</head>
<body>
<div>
    <div class="container">
        @include('alert_message')
        <h2>Regisztráció</h2>
        <div class="buttons">
            <a href="{{ route('home') }}">Vissza a főoldalra</a>
        </div>
        <form method="POST" action="{{ route('register.in') }}">
            @csrf
            <div>
                <div>
                    <label for="name">Név:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <div>
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                @error('phone')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <div>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" required>
                </div>
                @error('address')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <div>
                    <label for="password">Jelszó:</label>
                    <input type="password" name="password" required>
                </div>
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror

                <div>
                    <label for="password_confirmation">Jelszó megerősítése:</label>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>

            <button style="margin-bottom: 7px" type="submit" role="button">Regisztráció</button>
            <button><a href="{{ route('login.page') }}">Bejelentkezés</a></button>
        </form>
    </div>
</div>
</body>

</html>
