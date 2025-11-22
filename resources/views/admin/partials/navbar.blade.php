<header class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Admin Dashboard</h1>

    <div class="flex items-center gap-4">
        <span>{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-red-600">Logout</button>
        </form>
    </div>
</header>
