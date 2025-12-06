<!-- Top Navigation -->
    <nav class="top-navbar">
        <div class="logo-nav">
            <img src="{{asset('images/logoSkenaAktor.png')}}" alt="logo" class="img">
            <div class="admin-label">Admin Panel</div>
        </div>
        <div class="nav-buttons">
            <a class="btn-back text-decoration-none" id="backBtn" href="{{route('home.index')}}">
                <i class="bi bi-arrow-left"></i>
                Beranda
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-logout">Logout</button>
            </form>
        </div>
    </nav>
