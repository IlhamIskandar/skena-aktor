<div class="topbar">
  <div style="display:flex;gap:12px;align-items:center">
    <div class="badge">Dashboard</div>

    <div class="search" role="search">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35" stroke="#0f172a" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="11" cy="11" r="6" stroke="#0f172a" stroke-width="1.4"/></svg>
      <input id="globalSearch" placeholder="Cari peserta, kelas, atau sertifikat..." />
    </div>
  </div>

  <div class="profile">
    <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-danger border-0 bg-transparent">Logout</button>
        </form>
    </div>
    <div class="badge">Online</div>
    <div class="profile-info" style="text-align:right">
      <div style="font-weight:700">Ilham</div>
      <div class="small-muted">Administrator</div>
    </div>
    <div class="avatar">I</div>
  </div>
</div>
