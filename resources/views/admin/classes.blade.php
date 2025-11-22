@extends('layouts.admin')
@section('title', 'Classes — Skena Aktor')

@section('content')
    <!-- Classes View -->
      <section id="view-classes" class="view" style="">
        <div class="section-title">
          <h2>Manajemen Kelas</h2>
          <div>
            <button class="btn btn-primary" onclick="openClassModal()">Tambah Kelas</button>
            <button class="btn btn-ghost" onclick="renderClasses()">Refresh</button>
          </div>
        </div>

        <div class="card" id="classesList">
          <table>
            <thead><tr><th>Nama Kelas</th><th>Pengajar</th><th>Kuota</th><th>Terdaftar</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody id="classesTable"></tbody>
          </table>
        </div>

        <!-- class modal (simple) -->
        <div id="classModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.35);align-items:center;justify-content:center;padding:24px">
          <div style="background:#fff;padding:20px;border-radius:12px;min-width:420px;box-shadow:var(--shadow)">
            <h3 id="classModalTitle">Tambah Kelas</h3>
            <div class="mt-12">
              <input id="className" class="input mb-8" placeholder="Nama Kelas" />
              <input id="classTeacher" class="input mb-8" placeholder="Pengajar" />
              <div class="form-row mb-8">
                <input id="classQuota" class="input" type="number" placeholder="Kuota" />
                <select id="classStatus" class="input">
                  <option value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
                </select>
              </div>
              <div style="display:flex;gap:8px;justify-content:flex-end">
                <button class="btn btn-ghost" onclick="closeClassModal()">Batal</button>
                <button class="btn btn-primary" onclick="saveClass()">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-classes.js')) !!}
</script>
@endpush --}}
