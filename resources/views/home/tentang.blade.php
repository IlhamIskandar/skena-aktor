@extends('layouts.home.app')

@section('content')

<section class="about-hero py-5">
    <div class="container-fluid"> <!-- Ganti dari container ke container-fluid -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 text-center"> <!-- Kolom yang lebih lebar -->
                <div class="about-hero-content">
                    <h1 class="display-4 fw-bold mb-4">Tentang Kami</h1>
                    <p class="lead mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="mb-0">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR STORY SECTION DENGAN LAYOUT 1 TALL KIRI, 2 SMALL KANAN -->
<section class="our-story py-5 our-story-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-11">
        <div class="row align-items-center">
          <!-- Kolom kiri - Gambar layout -->
          <div class="col-lg-5">
            <div class="story-boxes-layout">
              <div class="box-main-row">
                <!-- Gambar tinggi di kiri -->
                <div class="story-box box-tall">
                  <img src="{{ asset('images/b1.jpg') }}" alt="Story Image 1">
                </div>
                <!-- Dua gambar kecil di kanan -->
                <div class="small-boxes-column">
                  <div class="story-box box-small">
                    <img src="{{ asset('images/b2.jpg') }}" alt="Story Image 2">
                  </div>
                  <div class="story-box box-small">
                    <img src="{{ asset('images/b3.jpg') }}" alt="Story Image 3">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Kolom kanan - Teks -->
          <div class="col-lg-7">
            <div class="story-content ps-lg-5">
              <h2 class="story-section-title fw-bold mb-3">Our story</h2>
              <div class="section-divider mb-4"></div>
              <p class="story-text mb-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                Seel do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="story-text mb-0">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-5 bg-core-values">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row mission-vision-row">
                    <div class="col-lg-6 mission-vision-col"> <!-- Ganti class -->
                        <div class="card-mission-vision text-center">
                            <h3 class="fw-bold mb-3">Our Mission</h3>
                            <p>
                                To provide world-class acting education that empowers individuals to express themselves authentically, develop their artistic voice, and pursue successful careers in the performing arts.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 mission-vision-col"> <!-- Ganti class -->
                        <div class="card-mission-vision text-center">
                            <h3 class="fw-bold mb-3">Our Vision</h3>
                            <p>
                                To provide world-class acting education that empowers individuals to express themselves authentically, develop their artistic voice, and pursue successful careers in the performing arts.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 bg-core-values">
    <div class="container core-values-container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <!-- Judul dengan Values berwarna kuning -->
                <h1 class="core-values-title">
                    Our Core <span class="yellow-text">Values</span>
                </h1>
                <p class="core-values-subtitle">
                    The principles that guide everything we do at Skena Aktor
                </p>

                <!-- Grid Core Values 4 Kolom dengan Icon -->
                <div class="core-values-grid">
                    <!-- Value 1 - Standards -->
                    <div class="core-value-item">
                        <div class="core-value-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <p class="core-value-text">
                            We strive for the highest standards in acting education and performance
                        </p>
                    </div>

                    <!-- Value 2 - Passion -->
                    <div class="core-value-item">
                        <div class="core-value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <p class="core-value-text">
                            We foster a deep love for the craft and artistic expression
                        </p>
                    </div>

                    <!-- Value 3 - Innovation -->
                    <div class="core-value-item">
                        <div class="core-value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <p class="core-value-text">
                            We encourage innovative thinking and unique artistic voices
                        </p>
                    </div>

                    <!-- Value 4 - Learning -->
                    <div class="core-value-item">
                        <div class="core-value-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <p class="core-value-text">
                            We support continuous learning and personal development
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 founder-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Judul Section -->
                <h1 class="founder-title">
                    Meet Our <span class="founder-highlight">Founder</span>
                </h1>

                <!-- Founder Content -->
                <div class="founder-box">
                    <div class="row align-items-center">
                        <!-- Gambar Founder -->
                        <div class="col-lg-4">
                            <div class="founder-image-container">
                                <div class="founder-image"></div>
                            </div>
                        </div>

                        <!-- Konten Teks -->
                        <div class="col-lg-8 founder-content">
                            <h2 class="founder-name">Renny Handayani Safftri</h2>
                            <p class="founder-description">
                                With over <strong>15 years of experience</strong> in theater, film, and television, Renny founded Skena Aktor to share her passion for acting and create opportunities for aspiring performers in Bandung.<br><br>
                                Her vision has transformed Skena Aktor into a thriving community where creativity, professionalism, and artistic excellence come together.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 Expert-instructors">
    <div class="container expert-container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <!-- Judul Section -->
                <h1 class="expert-title">Expert Instructors</h1>
                <p class="expert-subtitle">
                    Learn from industry professionals with decades of combined experience
                </p>

                <!-- Grid Expert Cards -->
                <div class="expert-grid">
                    <!-- Theater Specialists -->
                    <div class="expert-card">
                        <div class="expert-icon">
                            <i class="fas fa-theater-masks"></i>
                        </div>
                        <h3 class="expert-category">Theater Specialists</h3>
                        <p class="expert-description">
                            Professional stage actors and directors with extensive theatrical experience
                        </p>
                    </div>

                    <!-- Film & TV Experts -->
                    <div class="expert-card">
                        <div class="expert-icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <h3 class="expert-category">Film & TV Experts</h3>
                        <p class="expert-description">
                            Working actors and directors from Indonesia's film and television industry
                        </p>
                    </div>

                    <!-- Voice & Movement Coaches -->
                    <div class="expert-card">
                        <div class="expert-icon">
                            <i class="fas fa-microphone-alt"></i>
                        </div>
                        <h3 class="expert-category">Voice & Movement Coaches</h3>
                        <p class="expert-description">
                            Specialists in vocal training, physical theater, and performance techniques
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
