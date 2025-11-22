@extends('layouts.admin')
@section('title', 'Certificates — Skena Aktor')

@section('content')
    <!-- Certificates View -->
      <section id="view-certificates" class="view" style="">
        <div class="section-title">
          <h2>Manajemen Sertifikat</h2>
          <div>
            <button class="btn btn-primary" onclick="generateDemoCertificate()">Generate Sertifikat Demo</button>
            <button class="btn btn-ghost" onclick="renderCertificates()">Refresh</button>
          </div>
        </div>

        <div class="card">
          <table>
            <thead><tr><th>Nama</th><th>Kelas</th><th>Tanggal</th><th>File</th><th>Aksi</th></tr></thead>
            <tbody id="certsTable"></tbody>
          </table>
        </div>
      </section>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-certificates.js')) !!}
</script>
@endpush --}}
