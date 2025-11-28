<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand-custom" href="#">
        <img src="{{ asset('images/logoSkena.png') }}" alt="Skena Aktor Logo" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

            <ul class="navbar-nav me-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('tentang.index') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('program.index') }}">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('daftar.index') }}">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('benefit.index') }}">Benefit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('kontak.index') }}">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="#chatbot">ChatBot</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item d-flex">
                    <a href="#" class="nav-button-custom nav-register-btn me-2">Register</a>
                    <a href="#" class="nav-button-custom nav-login-btn">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
