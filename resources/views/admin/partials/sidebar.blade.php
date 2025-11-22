<aside class="sidebar" role="navigation" aria-label="Sidebar">
  <div class="brand">
    <div class="logo">SA</div>
    <div>
      <h1>Skena Aktor</h1>
      <div class="small-muted">Admin Panel</div>
    </div>
  </div>

  <nav class="menu" id="menu">
    <a href="{{ route('admin.dashboard') }}" class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}"><div class="dot"></div> Dashboard</a>
    <a href="{{ route('admin.participants') }}" class="menu-item {{ request()->is('admin/participants') ? 'active' : '' }}"><div class="dot"></div> Participants</a>
    <a href="{{ route('admin.classes') }}" class="menu-item {{ request()->is('admin/classes') ? 'active' : '' }}"><div class="dot"></div> Classes</a>
    <a href="{{ route('admin.certificates') }}" class="menu-item {{ request()->is('admin/certificates') ? 'active' : '' }}"><div class="dot"></div> Certificates</a>
    <a href="{{ route('admin.notifications') }}" class="menu-item {{ request()->is('admin/notifications') ? 'active' : '' }}"><div class="dot"></div> Notifications</a>
    <a href="{{ route('admin.chatbot') }}" class="menu-item {{ request()->is('admin/chatbot') ? 'active' : '' }}"><div class="dot"></div> Chatbot</a>
  </nav>

  <div style="margin-top:20px" class="small-muted">
    <div>Logged in as</div>
    <div style="display:flex;align-items:center;gap:8px;margin-top:8px">
      <div class="avatar">I</div>
      <div>
        <div style="font-weight:700">Ilham</div>
        <div class="small-muted">Super Admin</div>
      </div>
    </div>
  </div>
</aside>
