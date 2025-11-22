<nav class="navbar">
    <div class="logo">
        <img src="{{asset('images/logoSkenaAktor.png')}}" alt="Sena Aktor Logo" class="logo">
    </div>

    <ul class="nav-menu">
        <li><a href="{{url('/')}}">Beranda</a></li>
        <li><a href="{{route('tentang.index')}}">Tentang</a></li>
        <li><a href="{{url('/program')}}">Program</a></li>
        <li><a href="{{url('/daftar')}}">Daftar</a></li>
        <li><a href="{{url('/benefit')}}">Benefit</a></li>
        <li><a href="{{url('/kontak')}}">Kontak</a></li>
        <li><a href="{{url('/chatbot')}}">ChatBot</a></li>
    </ul>

    <div class="nav-buttons">
        <a href="{{route('daftar.index')}}"><button class="btn btn-register">Register</button></a>
        <a href="{{route('login')}}"><button class="btn btn-login">Login</button></a>
    </div>
</nav>
