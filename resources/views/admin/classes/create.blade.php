@extends('layouts.admin')
@section('title', 'Tambah Kelas — Skena Aktor')

@section('content')

<div id="aturKelasPage">
    <div class="header-section">
        <h1 class="page-title">Tambah Kelas</h1>
        <p class="page-subtitle">Lengkapi data untuk membuat kelas baru</p>
    </div>

    {{-- Kembali --}}
    <a href="{{ route('admin.classes.index') }}" class="btn-primary-custom mb-4 text-decoration-none">
        <i class="bi bi-arrow-left"></i> Kembali ke Manajemen Kelas
    </a>

    <div class="row">
        <div class="col-lg-8">

            {{-- Form Create Kelas --}}
            <div class="content-card">
                <h2 class="section-title">Form Kelas</h2>

                <form action="{{ route('admin.classes.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Nama Kelas --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') }}" required placeholder="Masukkan nama kelas">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Mentor --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Instruktur</label>
                            <input type="text" name="mentor" class="form-control"
                                value="{{ old('mentor') }}" placeholder="Nama instruktur">
                            @error('mentor')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Hari --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hari Belajar</label>
                            <select name="day_of_week" class="form-select">
                                <option value="">-- Pilih Hari --</option>
                                @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                                    <option value="{{ $day }}" {{ old('day_of_week') == $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                            @error('day_of_week')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Waktu Mulai --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="start_time" class="form-control"
                                value="{{ old('start_time') }}">
                            @error('start_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Waktu selesai --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="end_time" class="form-control"
                                value="{{ old('end_time') }}">
                            @error('end_time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Durasi Pekan --}}
                        <div class="col-md-3 mb-3">
                             <label class="form-label">Jumlah Pekan</label>
                            <input type="text" name="duration_weeks" class="form-control"
                                value="{{ old('duration_weeks') }}" required placeholder="Contoh: 1">
                            @error('duration_weeks')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal mulai --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ old('start_date') }}">
                            @error('start_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" min="0" class="form-control"
                                value="{{ old('price') }}" required placeholder="0 = Gratis">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Max Peserta --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Max Peserta</label>
                            <input type="number" name="max_participant" min="1" class="form-control"
                                value="{{ old('max_participant') }}" required placeholder="Contoh: 20">
                            @error('max_participant')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="upcoming" {{ old('status')=='upcoming'?'selected':'' }}>Akan Dimulai</option>
                                <option value="ongoing" {{ old('status')=='ongoing'?'selected':'' }}>Sedang Berjalan</option>
                                <option value="finished" {{ old('status')=='finished'?'selected':'' }}>Selesai</option>
                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Deskripsi singkat kelas">{{ old('description') }}</textarea>
                        </div>

                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-selesai w-100">
                        <i class="bi bi-check-circle"></i> Simpan Kelas
                    </button>

                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="content-card small-muted">
                <strong>Tip:</strong> Pastikan semua data sudah benar sebelum menyimpan.
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2025 Skena Aktor. All rights reserved.
    </div>
</div>

@endsection
