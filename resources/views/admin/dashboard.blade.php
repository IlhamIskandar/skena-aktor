@extends('layouts.admin')
@section('title', 'Dashboard — Skena Aktor')
@section('content')
<section id="view-dashboard" class="view">
          <div class="header-section">
              <h1 class="page-title">Dashboard Overview</h1>
              <p class="page-subtitle">Ringkasan aktivitas dan statistik terbaru.</p>
          </div>

          <div class="dashboard-grid">
              <div class="kpi-card">
                  <div>
                      <div class="kpi-label">Total Peserta</div>
                      <div class="kpi-value" id="kpi-total">0</div>
                  </div>
                  <div class="kpi-badge">+2% minggu ini</div>
              </div>
              <div class="kpi-card">
                  <div>
                      <div class="kpi-label">Total Kelas</div>
                      <div class="kpi-value" id="kpi-classes">0</div>
                  </div>
                  <div class="kpi-badge">Stabil</div>
              </div>
              <div class="kpi-card">
                  <div>
                      <div class="kpi-label">Sertifikat</div>
                      <div class="kpi-value" id="kpi-certs">0</div>
                  </div>
                  <div class="kpi-badge">+8 baru</div>
              </div>
              <div class="kpi-card">
                  <div>
                      <div class="kpi-label">Pesan Aktif</div>
                      <div class="kpi-value" id="kpi-notifs">0</div>
                  </div>
                  <div class="kpi-badge">Baru</div>
              </div>
          </div>

          <div class="content-card">
              <div class="d-flex justify-between align-center mb-3">
                  <h2 class="section-title" style="margin:0;">Analytics Peserta</h2>
                  <div class="d-flex gap-2">
                      <button class="btn-back" style="border:1px solid #ddd; padding: 5px 15px; border-radius:10px;" onclick="downloadSampleCSV()">Download CSV</button>
                      <button class="btn-primary-custom" onclick="showParticipantsView()">Kelola Peserta</button>
                  </div>
              </div>

              <div class="d-flex gap-2" style="flex-wrap:wrap">
                  <div style="flex:1; min-width:300px;">
                      <canvas id="chart-registrations" height="140"></canvas>
                  </div>
                  <div style="width:300px;">
                      <div class="form-label">Distribusi Kelas</div>
                      <canvas id="chart-classes" height="180"></canvas>
                  </div>
              </div>
          </div>

          <div class="dashboard-grid" style="grid-template-columns: 2fr 1fr;">
              <div class="content-card" style="margin-bottom:0;">
                  <div class="section-title">Peserta Terbaru</div>
                  <div class="table-responsive">
                      <table class="custom-table">
                          <thead><tr><th>Nama</th><th>Kelas</th><th>Status</th><th>Aksi</th></tr></thead>
                          <tbody id="latestParticipants"></tbody>
                      </table>
                  </div>
              </div>

              <div class="content-card" style="margin-bottom:0;">
                  <div class="section-title">Notifikasi Terakhir</div>
                  <div style="color:#999; text-align:center; padding:20px;" id="recentNotifs">Belum ada notifikasi</div>
              </div>
          </div>
      </section>

      <section id="view-participants" class="view d-none">
          <div class="header-section d-flex justify-between align-center">
              <div>
                  <h1 class="page-title">Kelola Peserta</h1>
                  <p class="page-subtitle">Manajemen data peserta didik.</p>
              </div>
          </div>

          <div class="search-filter">
              <input id="filterName" class="form-control" placeholder="Cari nama atau email..." style="flex:2;" />
              <select id="filterClass" class="form-select" style="flex:1;">
                  <option value="">Semua Kelas</option>
              </select>
              <select id="filterStatus" class="form-select" style="flex:1;">
                  <option value="">Semua Status</option>
                  <option value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
              </select>
              <button class="btn-primary-custom" onclick="exportFilteredCSV()">Ekspor CSV</button>
          </div>

          <div class="content-card">
              <div class="table-responsive">
                  <table class="custom-table">
                      <thead><tr><th>#</th><th>Nama</th><th>Email</th><th>Kelas</th><th>Status</th><th>Aksi</th></tr></thead>
                      <tbody id="participantsTable"></tbody>
                  </table>
              </div>
          </div>

          <div class="content-card">
              <h3 class="section-title">Tambah Peserta Baru</h3>
              <div class="search-filter mb-2">
                  <input id="newName" class="form-control" placeholder="Nama lengkap" style="flex:1;" />
                  <input id="newEmail" class="form-control" placeholder="Email" style="flex:1;" />
              </div>
              <div class="search-filter mb-2">
                  <select id="newClass" class="form-select" style="flex:1;"></select>
                  <select id="newStatus" class="form-select" style="flex:1;">
                      <option value="active">Aktif</option>
                      <option value="inactive">Tidak Aktif</option>
                  </select>
              </div>
              <div class="d-flex gap-2">
                  <button class="btn-tambah" onclick="addParticipant()">Tambah Peserta</button>
                  <button class="btn-back" onclick="clearParticipantForm()">Bersihkan</button>
              </div>
          </div>
      </section>

      <section id="view-classes" class="view d-none">
          <div class="header-section d-flex justify-between align-center">
              <div>
                  <h1 class="page-title">Manajemen Kelas</h1>
                  <p class="page-subtitle">Atur jadwal dan kuota kelas.</p>
              </div>
              <div class="d-flex gap-2">
                  <button class="btn-primary-custom" onclick="openClassModal()">+ Tambah Kelas</button>
                  <button class="btn-back" onclick="renderClasses()">Refresh</button>
              </div>
          </div>

          <div class="content-card">
              <div class="table-responsive">
                  <table class="custom-table">
                      <thead><tr><th>Nama Kelas</th><th>Pengajar</th><th>Kuota</th><th>Terdaftar</th><th>Status</th><th>Aksi</th></tr></thead>
                      <tbody id="classesTable"></tbody>
                  </table>
              </div>
          </div>
      </section>

      <section id="view-certificates" class="view d-none">
          <div class="header-section d-flex justify-between align-center">
              <div>
                  <h1 class="page-title">Sertifikat</h1>
                  <p class="page-subtitle">Penerbitan dan arsip sertifikat.</p>
              </div>
              <div class="d-flex gap-2">
                  <button class="btn-primary-custom" onclick="generateDemoCertificate()">Generate Demo</button>
              </div>
          </div>

          <div class="content-card">
              <div class="table-responsive">
                  <table class="custom-table">
                      <thead><tr><th>Nama</th><th>Kelas</th><th>Tanggal</th><th>File</th><th>Aksi</th></tr></thead>
                      <tbody id="certsTable"></tbody>
                  </table>
              </div>
          </div>
      </section>

      <section id="view-notifications" class="view d-none">
          <div class="header-section">
              <h1 class="page-title">Broadcast Notifikasi</h1>
              <p class="page-subtitle">Kirim pengumuman ke seluruh peserta.</p>
          </div>

          <div class="content-card">
              <div class="mb-3">
                  <label class="form-label">Judul</label>
                  <input id="notifTitle" class="form-control" placeholder="Judul notifikasi" />
              </div>
              <div class="mb-3">
                  <label class="form-label">Pesan</label>
                  <textarea id="notifMessage" class="form-control" rows="4" placeholder="Tulis pesan..."></textarea>
              </div>
              <div class="d-flex gap-2">
                  <button class="btn-primary-custom" onclick="broadcastNotif()">Kirim Broadcast</button>
                  <button class="btn-back" onclick="clearNotifForm()">Bersihkan</button>
              </div>
          </div>

          <div class="content-card">
              <h3 class="section-title">Riwayat Notifikasi</h3>
              <div class="table-responsive">
                  <table class="custom-table">
                      <thead><tr><th>Waktu</th><th>Judul</th><th>Pesan</th></tr></thead>
                      <tbody id="notifHistory"></tbody>
                  </table>
              </div>
          </div>
      </section>

      <section id="view-chatbot" class="view d-none">
          <div class="header-section d-flex justify-between align-center">
              <div>
                  <h1 class="page-title">Chatbot AI (Demo)</h1>
                  <p class="page-subtitle">Latih respon otomatis untuk peserta.</p>
              </div>
              <div>
                  <button class="btn-primary-custom" onclick="trainChatbot()">Latih Model</button>
              </div>
          </div>

          <div class="dashboard-grid" style="grid-template-columns: 1fr 1fr; gap:20px;">
              <div class="content-card" style="margin-bottom:0;">
                  <h3 class="section-title">Data Pelatihan (FAQ)</h3>
                  <textarea id="qaPairs" class="form-control" rows="10" placeholder="Format: Pertanyaan||Jawaban (pisahkan baris)"></textarea>
                  <div class="d-flex gap-2 mt-3">
                      <button class="btn-tambah" onclick="saveQAPairs()">Simpan</button>
                      <button class="btn-back" onclick="loadQAPairs()">Muat</button>
                  </div>
              </div>

              <div class="content-card" style="margin-bottom:0;">
                  <div class="d-flex justify-between align-center mb-3">
                      <h3 class="section-title" style="margin:0">Simulasi Chat</h3>
                      <button class="btn-back" style="font-size:0.8rem" onclick="clearChatLogs()">Clear</button>
                  </div>

                  <div id="chatWindow" class="chat-window"></div>

                  <div class="d-flex gap-2">
                      <input id="chatInput" class="form-control" placeholder="Tanya chatbot..." />
                      <button class="btn-primary-custom" onclick="sendChat()">Kirim</button>
                  </div>
              </div>
          </div>
      </section>

@endsection
