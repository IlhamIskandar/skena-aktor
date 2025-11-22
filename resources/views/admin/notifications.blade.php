@extends('layouts.admin')
@section('title', 'Notifications — Skena Aktor')

@section('content')
    <!-- Notifications View -->
      <section id="view-notifications" class="view" style="">
        <div class="section-title">
          <h2>Broadcast Notifikasi</h2>
          <div class="small-muted">Kirim pesan ke peserta terdaftar (demo)</div>
        </div>

        <div class="card">
          <div class="form-row mb-8">
            <input id="notifTitle" class="input" placeholder="Judul notifikasi" />
          </div>
          <div class="form-row mb-8">
            <textarea id="notifMessage" class="input textarea" placeholder="Tulis pesan..."></textarea>
          </div>
          <div style="display:flex;gap:8px">
            <button class="btn btn-primary" onclick="broadcastNotif()">Kirim Broadcast</button>
            <button class="btn btn-ghost" onclick="clearNotifForm()">Bersihkan</button>
          </div>
        </div>

        <div class="card mt-12">
          <h3>Riwayat Notifikasi</h3>
          <table>
            <thead><tr><th>Waktu</th><th>Judul</th><th>Pesan</th></tr></thead>
            <tbody id="notifHistory"></tbody>
          </table>
        </div>
      </section>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-notifications.js')) !!}
</script>
@endpush --}}
