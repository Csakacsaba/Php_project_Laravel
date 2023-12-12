@vite('resources/css/header.css')

<body>
    <header>Menu</header>
    <nav>
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('shop')}}">Shop</a>
        <a href="#">About</a>
        <a href="#">Portfolio</a>
        <a href="#">Contact</a>
        @auth()
        <a href="{{route('cart')}}">🛒</a>
        @endauth
    </nav>
    <div class="top-right-container">
        @auth
            <a href="{{ route('logout') }}" class="login-button">Kijelentkezés</a>
            @if(\Illuminate\Support\Facades\Auth::user()->admin == 1)
                <a href="{{ route('admin.home') }}" class="login-button">Admin</a>
            @endif
        @endauth
        @guest
            <a href="{{ route('login.page') }}" class="login-button">Bejelentkezés</a>
            <a href="{{ route('register.page') }}" class="register-button">Regisztráció</a>
        @endguest
    </div>
</body>

