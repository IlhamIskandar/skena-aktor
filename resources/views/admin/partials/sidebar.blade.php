    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{route('admin.dashboard')}}" class="nav-link @if(request()->is('admin/dashboard*')) active @endif">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.participants.index')}}" class="nav-link @if(request()->is('admin/participants*')) active @endif">
                    <i class="bi bi-people"></i>
                    <span>Peserta</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.classes.index')}}" class="nav-link @if(request()->is('admin/classes*')) active @endif">
                    <i class="bi bi-book"></i>
                    <span>Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.certificates')}}" class="nav-link @if(request()->is('admin/certificates*')) active @endif">
                    <i class="bi bi-award"></i>
                    <span>Sertifikat</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="bi bi-bell"></i>
                    <span>Notifikasi</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="bi bi-chat-dots"></i>
                    <span>AI Chatbot</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->
