@extends('layouts.admin')
@section('title', 'Participants — Skena Aktor')

@section('content')
    <!-- Participants View -->
      <section id="view-participants" class="view" style="">
        <div class="section-title">
          <h2>Kelola Peserta</h2>
          <div class="controls">
            <input id="filterName" class="input" placeholder="Cari nama..." style="width:220px" />
            <select id="filterClass" class="input" style="width:220px">
              <option value="">Semua Kelas</option>
            </select>
            <select id="filterStatus" class="input" style="width:160px">
              <option value="">Semua Status</option>
              <option value="active">Aktif</option>
              <option value="inactive">Tidak Aktif</option>
            </select>
            <button class="btn btn-primary" onclick="exportFilteredCSV()">Ekspor CSV</button>
          </div>
        </div>

        <div class="card" style="margin-bottom:12px">
          <table>
            <thead><tr><th>#</th><th>Nama</th><th>Email</th><th>Kelas</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody id="participantsTable"></tbody>
          </table>
        </div>

        <div class="card">
          <h3>Tambah Peserta Baru</h3>
          <div style="margin-top:12px">
            <div class="form-row mb-8">
              <input id="newName" class="input" placeholder="Nama lengkap" />
              <input id="newEmail" class="input" placeholder="Email" />
            </div>
            <div class="form-row mb-8">
              <select id="newClass" class="input">
                <!-- filled by JS -->
              </select>
              <select id="newStatus" class="input">
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
              </select>
            </div>
            <div style="display:flex;gap:8px">
              <button class="btn btn-primary" onclick="addParticipant()">Tambah</button>
              <button class="btn btn-ghost" onclick="clearParticipantForm()">Bersihkan</button>
            </div>
          </div>
        </div>
      </section>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-participants.js')) !!}
</script>
@endpush --}}
