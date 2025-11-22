@extends('layouts.home.app')

@section('content')
<!-- Hero Section -->
<section class="programs-hero py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="programs-main-title">Our Programs</h1>
                <p class="programs-hero-subtitle">
                    Pilih kelas sesuai minat dan kemampuannu terutama untuk profesional.
                </p>
                <div class="programs-divider"></div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="programs-section py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 text-center">
                <h2 class="programs-section-title">Program Kami</h2>
                <p class="programs-section-subtitle">
                    Berbagai pilihan kelas untuk mengasah bakat dan kemampuanmu
                </p>
            </div>
        </div>

        <!-- Grid 4 Kolom -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- Program 1 - Acting Class -->
           <!-- Program 1 - Acting Class -->
<div class="col">
    <div class="program-card">
        <div class="program-content">
            <img src="https://via.placeholder.com/40/FFC107/FFFFFF?text=🎭" alt="Acting Icon" class="program-icon">
            <h3 class="program-title">Acting Class</h3>
            <p class="program-description">Pelajari seni peran dan ekspresi dengan teknik profesional dari mentor berpengalaman.</p>
            <div class="program-schedule">
                <div class="schedule-item">
                    <span class="schedule-label">Senin & Rabu</span>
                    <span class="schedule-value">16:00 - 18:00 WIB</span>
                </div>
                <div class="schedule-item">
                    <span class="schedule-label">Durasi:</span>
                    <span class="schedule-value">2 Jam / Sesi</span>
                </div>
            </div>
            <div class="program-price">
                <span class="price-amount">Rp500.000</span>
                <span class="price-period">per bulan</span>
            </div>
        </div>
    </div>
</div>

<!-- Program 2 - Script Writing -->
<div class="col">
    <div class="program-card">
        <div class="program-content">
            <img src="https://via.placeholder.com/40/FFC107/FFFFFF?text=✍️" alt="Script Writing Icon" class="program-icon">
            <h3 class="program-title">Script Writing</h3>
            <p class="program-description">Belajar menulis naskah yang kuat dan menarik dengan struktur cerita yang compelling.</p>
            <div class="program-schedule">
                <div class="schedule-item">
                    <span class="schedule-label">Selasa & Kamis</span>
                    <span class="schedule-value">15:00 - 17:00 WIB</span>
                </div>
                <div class="schedule-item">
                    <span class="schedule-label">Durasi:</span>
                    <span class="schedule-value">2 Jam / Sesi</span>
                </div>
            </div>
            <div class="program-price">
                <span class="price-amount">Rp450.000</span>
                <span class="price-period">per bulan</span>
            </div>
        </div>
    </div>
</div>

<!-- Program 3 - Voice Acting -->
<div class="col">
    <div class="program-card">
        <div class="program-content">
            <img src="https://via.placeholder.com/40/FFC107/FFFFFF?text=🎤" alt="Voice Acting Icon" class="program-icon">
            <h3 class="program-title">Voice Acting</h3>
            <p class="program-description">Tingkatkan percaya diri di panggung dan kamera dengan professional industry modeling.</p>
            <div class="program-schedule">
                <div class="schedule-item">
                    <span class="schedule-label">Sabtu</span>
                    <span class="schedule-value">10:00 - 12:00 WIB</span>
                </div>
                <div class="schedule-item">
                    <span class="schedule-label">Durasi:</span>
                    <span class="schedule-value">2 Jam / Sesi</span>
                </div>
            </div>
            <div class="program-price">
                <span class="price-amount">Rp400.000</span>
                <span class="price-period">per bulan</span>
            </div>
        </div>
    </div>
</div>

<!-- Program 4 - Kids Class -->
<div class="col">
    <div class="program-card">
        <div class="program-content">
            <img src="https://via.placeholder.com/40/FFC107/FFFFFF?text=👶" alt="Kids Class Icon" class="program-icon">
            <h3 class="program-title">Kids Class</h3>
            <p class="program-description">Kelas seni kreatif untuk mengembangkan bakat dan imajinasi anak-anak dengan cara menyenangkan.</p>
            <div class="program-schedule">
                <div class="schedule-item">
                    <span class="schedule-label">Minggu</span>
                    <span class="schedule-value">09:00 - 11:00 WIB</span>
                </div>
                <div class="schedule-item">
                    <span class="schedule-label">Durasi:</span>
                    <span class="schedule-value">2 Jam / Sesi</span>
                </div>
            </div>
            <div class="program-price">
                <span class="price-amount">Rp350.000</span>
                <span class="price-period">per bulan</span>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="programs-cta py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="cta-title">Siap Memulai Perjalananmu?</h2>
                <p class="cta-subtitle">
                    Bergabunglah dengan kami dan wujudkan potensi terbaikmu di dunia seni dan kreativitas
                </p>
                <div class="cta-divider"></div>
                <a href="{{ route('daftar.index') }}" class="cta-button">Lihat Selengkapnya &rarr;</a>
            </div>
        </div>
    </div>
</section>
@endsection
