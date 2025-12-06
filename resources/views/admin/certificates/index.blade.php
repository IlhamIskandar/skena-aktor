@extends('layouts.admin')
@section('title', 'Certificates — Skena Aktor')

@section('content')
<section id="view-certificates" class="view">
    <div class="section-title">
        <h2>Manajemen Sertifikat</h2>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateModal">
                <i class="bi bi-cloud-upload"></i> Upload Sertifikat Baru
            </button>
        </div>
    </div>

    {{-- Menampilkan Pesan Sukses/Error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Peserta</th>
                    <th>Kelas</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certificates as $cert)
                <tr>
                    <td>{{ $cert->code_certificate }}</td>
                    <td>{{ $cert->user->name ?? 'User dihapus' }}</td>
                    <td>{{ $cert->class->nama_kelas ?? 'Kelas dihapus' }}</td>
                    <td>{{ $cert->issued_date }}</td>
                    <td>
                        {{-- Tombol Lihat File --}}
                        <a href="{{ asset('storage/' . $cert->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Lihat File
                        </a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada sertifikat yang diupload.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        {{ $certificates->links() }}
    </div>
</section>

<div class="modal fade" id="generateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Sertifikat Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- 1. Pilihan User --}}
                    <div class="mb-3">
                        <label for="id_user" class="form-label">Pilih Peserta</label>
                        <select name="id_user" id="id_user" class="form-select" required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- 2. Pilihan Kelas (Perbaikan Dropdown) --}}
                    <div class="mb-3">
                        <label for="id_class" class="form-label">Pilih Kelas</label>
                        <select name="id_class" id="id_class" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            {{-- Menggunakan variabel $classes_list yang dikirim Controller --}}
                            @foreach($classes_list as $kls)
                                <option value="{{ $kls->id_class }}">
                                    {{ $kls->id_class }}
                                </option>
                            @endforeach
                        </select>
                        @if($classes_list->isEmpty())
                            <small class="text-danger">Data kelas kosong. Silakan tambah kelas dulu.</small>
                        @endif
                    </div>

                    {{-- 3. Input File (Fitur Baru) --}}
                    <div class="mb-3">
                        <label for="certificate_file" class="form-label">Upload File (JPG, PNG, PDF)</label>
                        <input type="file" name="certificate_file" id="certificate_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        <small class="text-muted">Maksimal ukuran file 2MB.</small>
                    </div>

                    {{-- 4. Tanggal --}}
                    <div class="mb-3">
                        <label for="issued_date" class="form-label">Tanggal Terbit</label>
                        <input type="date" name="issued_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
