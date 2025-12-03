<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Skena Aktor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            padding: 30px 20px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(255,255,255,0.3);
        }

        .sidebar-header h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            color: #555;
            font-size: 14px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.3);
            transform: translateX(5px);
        }

        .nav-link.active {
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .nav-icon {
            margin-right: 12px;
            font-size: 20px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .content-section {
            display: none;
            animation: fadeIn 0.5s;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            margin-bottom: 30px;
        }

        .section-header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #666;
            font-size: 16px;
        }

        /* Profile Section */
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
            margin-right: 30px;
            box-shadow: 0 4px 15px rgba(255,193,7,0.3);
        }

        .profile-info h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .profile-info p {
            color: #666;
            font-size: 16px;
        }

        .profile-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #FFC107;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            color: #333;
            box-shadow: 0 4px 15px rgba(255,193,7,0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,193,7,0.4);
        }

        /* Classes Section */
        .classes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .class-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .class-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .class-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
        }

        .class-content {
            padding: 25px;
        }

        .class-content h3 {
            color: #333;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .class-content p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .class-progress {
            margin: 20px 0;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: #666;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #FFC107 0%, #FFD54F 100%);
            border-radius: 10px;
            transition: width 0.3s;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }

        .status-active {
            background: #E8F5E9;
            color: #2E7D32;
        }

        .status-completed {
            background: #E3F2FD;
            color: #1565C0;
        }

        .status-pending {
            background: #FFF3E0;
            color: #E65100;
        }

        /* Certificates Section */
        .certificates-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .certificate-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 3px solid #FFC107;
            transition: all 0.3s;
        }

        .certificate-card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .certificate-icon {
            font-size: 48px;
            text-align: center;
            margin-bottom: 20px;
        }

        .certificate-card h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
        }

        .certificate-card p {
            color: #666;
            font-size: 14px;
            text-align: center;
            margin-bottom: 8px;
        }

        .certificate-date {
            color: #999;
            font-size: 12px;
            text-align: center;
            margin-top: 15px;
        }

        .btn-download {
            width: 100%;
            margin-top: 15px;
            background: white;
            border: 2px solid #FFC107;
            color: #333;
        }

        .btn-download:hover {
            background: #FFC107;
        }

        /* Mobile Menu Toggle */
        .mobile-header {
            display: none;
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .mobile-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-header h2 {
            color: #333;
            font-size: 20px;
        }

        .hamburger {
            width: 30px;
            height: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
            z-index: 1001;
        }

        .hamburger span {
            width: 100%;
            height: 3px;
            background: #333;
            border-radius: 3px;
            transition: all 0.3s;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translateY(11px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translateY(-11px);
        }

        .sidebar.mobile-open {
            transform: translateX(0);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 998;
        }

        .overlay.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mobile-header {
                display: block;
            }

            .dashboard-wrapper {
                flex-direction: column;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 280px;
                height: 100vh;
                transform: translateX(-100%);
                transition: transform 0.3s;
                z-index: 999;
                overflow-y: auto;
            }

            .main-content {
                padding: 20px;
                margin-top: 0;
            }

            .profile-form {
                grid-template-columns: 1fr;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-avatar {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .classes-grid,
            .certificates-grid {
                grid-template-columns: 1fr;
            }

            .section-header h1 {
                font-size: 24px;
            }

            .section-header p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .mobile-header h2 {
                font-size: 18px;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 36px;
            }

            .class-content {
                padding: 20px;
            }

            .certificate-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Header -->
    <header class="mobile-header">
        <div class="mobile-header-content">
            <h2>Skena Aktor</h2>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <!-- Overlay for mobile -->
    <div class="overlay" id="overlay"></div>

    <div class="dashboard-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Skena Aktor</h2>
                <p>Portal Pengguna</p>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" data-section="profile">
                            <span class="nav-icon">👤</span>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="classes">
                            <span class="nav-icon">📚</span>
                            <span>Kelas Saya</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="certificates">
                            <span class="nav-icon">🏆</span>
                            <span>Sertifikat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">⚙️</span>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-icon">🚪</span>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- User Profile Section -->
            <section id="profile" class="content-section active">
                <div class="section-header">
                    <h1>Profil Saya</h1>
                    <p>Kelola informasi pribadi dan preferensi akun Anda</p>
                </div>

                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">👤</div>
                        <div class="profile-info">
                            <h2>John Doe</h2>
                            <p>Member sejak Januari 2024</p>
                        </div>
                    </div>

                    <form class="profile-form">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="John Doe" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="john.doe@example.com" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="tel" value="+62 812-3456-7890" placeholder="Masukkan nomor telepon">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" value="1995-05-15">
                        </div>
                        <div class="form-group full-width">
                            <label>Alamat</label>
                            <input type="text" value="Jl. Contoh No. 123, Jakarta" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group full-width">
                            <label>Bio</label>
                            <textarea rows="4" placeholder="Ceritakan sedikit tentang diri Anda">Saya adalah aktor pemula yang passionate dalam seni peran dan ingin terus mengembangkan kemampuan akting saya.</textarea>
                        </div>
                        <div class="form-group full-width">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- User Classes Section -->
            <section id="classes" class="content-section">
                <div class="section-header">
                    <h1>Kelas Saya</h1>
                    <p>Pantau progress dan kelola kelas yang Anda ikuti</p>
                </div>

                <div class="classes-grid">
                    <div class="class-card">
                        <div class="class-image">🎭</div>
                        <div class="class-content">
                            <h3>Acting Class</h3>
                            <p>Teknik dasar akting untuk pemula dengan metode Stanislavski</p>
                            <div class="class-progress">
                                <div class="progress-label">
                                    <span>Progress</span>
                                    <span>75%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 75%"></div>
                                </div>
                            </div>
                            <span class="status-badge status-active">Sedang Berlangsung</span>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-image">🎬</div>
                        <div class="class-content">
                            <h3>Screen Acting</h3>
                            <p>Belajar akting di depan kamera untuk film dan televisi</p>
                            <div class="class-progress">
                                <div class="progress-label">
                                    <span>Progress</span>
                                    <span>100%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 100%"></div>
                                </div>
                            </div>
                            <span class="status-badge status-completed">Selesai</span>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-image">🎪</div>
                        <div class="class-content">
                            <h3>Body & Voice</h3>
                            <p>Pelatihan vokal dan body movement untuk aktor</p>
                            <div class="class-progress">
                                <div class="progress-label">
                                    <span>Progress</span>
                                    <span>35%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 35%"></div>
                                </div>
                            </div>
                            <span class="status-badge status-active">Sedang Berlangsung</span>
                        </div>
                    </div>

                    <div class="class-card">
                        <div class="class-image">💃</div>
                        <div class="class-content">
                            <h3>Dance Class</h3>
                            <p>Koreografi dan movement untuk pertunjukan teater</p>
                            <div class="class-progress">
                                <div class="progress-label">
                                    <span>Progress</span>
                                    <span>0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            <span class="status-badge status-pending">Belum Dimulai</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Certificates Section -->
            <section id="certificates" class="content-section">
                <div class="section-header">
                    <h1>Sertifikat Saya</h1>
                    <p>Kumpulan pencapaian dan sertifikat yang telah Anda raih</p>
                </div>

                <div class="certificates-grid">
                    <div class="certificate-card">
                        <div class="certificate-icon">🏆</div>
                        <h3>Screen Acting Certificate</h3>
                        <p>Menyelesaikan program Screen Acting dengan nilai A</p>
                        <p class="certificate-date">Diterbitkan: 15 Maret 2024</p>
                        <button class="btn btn-download">Unduh Sertifikat</button>
                    </div>

                    <div class="certificate-card">
                        <div class="certificate-icon">🎖️</div>
                        <h3>Basic Acting Certificate</h3>
                        <p>Menyelesaikan program Acting Class dasar</p>
                        <p class="certificate-date">Diterbitkan: 10 Februari 2024</p>
                        <button class="btn btn-download">Unduh Sertifikat</button>
                    </div>

                    <div class="certificate-card">
                        <div class="certificate-icon">⭐</div>
                        <h3>Workshop Participant</h3>
                        <p>Mengikuti Workshop Intensif Akting Teater</p>
                        <p class="certificate-date">Diterbitkan: 5 Januari 2024</p>
                        <button class="btn btn-download">Unduh Sertifikat</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Mobile menu functionality
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('overlay');
        const navLinks = document.querySelectorAll('.nav-link[data-section]');
        const sections = document.querySelectorAll('.content-section');

        // Toggle mobile menu
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('mobile-open') ? 'hidden' : '';
        });

        // Close menu when overlay is clicked
        overlay.addEventListener('click', () => {
            hamburger.classList.remove('active');
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Navigation functionality
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('active'));

                // Add active class to clicked link
                link.classList.add('active');

                // Hide all sections
                sections.forEach(section => section.classList.remove('active'));

                // Show selected section
                const sectionId = link.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');

                // Close mobile menu after selection
                if (window.innerWidth <= 768) {
                    hamburger.classList.remove('active');
                    sidebar.classList.remove('mobile-open');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }

                // Smooth scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });

        // Form submission
        const profileForm = document.querySelector('.profile-form');
        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Profil berhasil disimpan!');
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                hamburger.classList.remove('active');
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Touch swipe to close menu
        let touchStartX = 0;
        let touchEndX = 0;

        sidebar.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        sidebar.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchStartX - touchEndX > 50) {
                // Swipe left
                hamburger.classList.remove('active');
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    </script>
</body>
</html>
