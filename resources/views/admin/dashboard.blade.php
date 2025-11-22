@extends('layouts.admin')
@section('title', 'Dashboard — Skena Aktor')

@section('content')
    {{-- COPY-PASTE isi <section id="view-dashboard"> --}}
    <!-- Dashboard View -->
      <section id="view-dashboard" class="view">
        <div class="grid">
          <div class="card kpi">
            <div>
              <div class="label small-muted">Total Peserta</div>
              <div class="value" id="kpi-total">65</div>
            </div>
            <div class="pill">+2% minggu ini</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Total Kelas</div>
              <div class="value" id="kpi-classes">12</div>
            </div>
            <div class="pill">Stabil</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Sertifikat Diterbitkan</div>
              <div class="value" id="kpi-certs">45</div>
            </div>
            <div class="pill">+8 baru</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Pesan Aktif</div>
              <div class="value" id="kpi-notifs">8</div>
            </div>
            <div class="pill">Baru</div>
          </div>
        </div>

        <div class="card" style="margin-bottom:16px;">
          <div class="section-title">
            <h2>Analytics Peserta</h2>
            <div>
              <button class="btn btn-ghost" onclick="downloadSampleCSV()">Download CSV</button>
              <button class="btn btn-primary" onclick="showParticipantsView()">Kelola Peserta</button>
            </div>
          </div>
          <div style="display:flex;gap:16px;align-items:center;flex-wrap:wrap">
            <div style="flex:1;min-width:320px">
              <canvas id="chart-registrations" height="140"></canvas>
            </div>
            <div style="width:320px">
              <div class="small-muted">Distribusi Kelas</div>
              <canvas id="chart-classes" height="180"></canvas>
            </div>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 360px;gap:16px">
          <div class="card">
            <div class="section-title">
              <h2>Peserta Terbaru</h2>
              <div class="small-muted">Update 2 menit lalu</div>
            </div>
            <table>
              <thead><tr><th>Nama</th><th>Kelas</th><th>Status</th><th></th></tr></thead>
              <tbody id="latestParticipants">
                <!-- filled by JS -->
              </tbody>
            </table>
          </div>

          <div class="card">
            <h3 style="margin-top:0">Notifikasi Terakhir</h3>
            <div class="card-empty" id="recentNotifs">Belum ada notifikasi</div>
          </div>
        </div>
      </section>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-dashboard.js')) !!}
</script>
@endpush --}}
