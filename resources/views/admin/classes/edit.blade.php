@extends('layouts.admin')
@section('title', 'Edit Kelas — Skena Aktor')
@section('content')

<div id="aturKelasPage">
    <div class="header-section">
        <h1 class="page-title">Edit Kelas</h1>
        <p class="page-subtitle">Ubah informasi kelas dan kelola peserta</p>
    </div>

    <a href="{{ route('admin.classes.index') }}" class="btn-primary-custom mb-4 text-decoration-none">
        <i class="bi bi-arrow-left"></i> Kembali ke Manajemen Kelas
    </a>

    <div class="row">

        {{-- Form Update Kelas --}}
        <div class="col-lg-8">
            <div class="content-card">
                <h2 class="section-title">Informasi Kelas</h2>

                <form action="{{ route('admin.classes.update', $class->id_class) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nama --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $class->name) }}" required>
                        </div>

                        {{-- Mentor --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Instruktur</label>
                            <input type="text" name="mentor" class="form-control"
                                value="{{ old('mentor', $class->mentor) }}">
                        </div>

                        {{-- Hari --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Hari Belajar</label>
                            <select name="day_of_week" class="form-select">
                                <option value="">-- Pilih Hari --</option>
                                @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                                    <option value="{{ $day }}" {{ old('day_of_week', $class->day_of_week) == $day ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jam mulai --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="start_time" class="form-control"
                                value="{{ old('start_time', $class->start_time) }}">
                        </div>

                        {{-- Jam selesai --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="end_time" class="form-control"
                                value="{{ old('end_time', $class->end_time) }}">
                        </div>

                        {{-- Durasi Pekan --}}
                        <div class="col-md-3 mb-3">
                             <label class="form-label">Jumlah Pekan</label>
                            <input type="text" name="duration_weeks" class="form-control"
                                value="{{ old('duration_weeks', $class->duration_weeks) }}" required placeholder="Contoh: 1">
                            @error('duration_weeks')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal mulai --}}
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ old('start_date', $class->start_date) }}">
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control"
                                value="{{ old('price', $class->price) }}" min="0" required>
                        </div>

                        {{-- Max peserta --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Max Peserta</label>
                            <input type="number" name="max_participant" class="form-control"
                                value="{{ old('max_participant', $class->max_participant) }}" min="1">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="upcoming" {{ old('status', $class->status)=='upcoming'?'selected':'' }}>Akan Dimulai</option>
                                <option value="ongoing" {{ old('status', $class->status)=='ongoing'?'selected':'' }}>Sedang Berjalan</option>
                                <option value="finished" {{ old('status', $class->status)=='finished'?'selected':'' }}>Selesai</option>
                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $class->description) }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-selesai w-100">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>

                </form>
            </div>

           {{-- Tambah Peserta --}}
<div class="content-card">
    <h2 class="section-title">Tambah Peserta ke Kelas</h2>

    <form action="{{ route('admin.classes.enroll.store', $class->id_class) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Peserta</label>
            <select name="id" class="form-select" required>
                <option value="">Pilih Peserta</option>

                @php
                    // Ambil ID user yang sudah terdaftar di kelas
                    $enrolledUserIds = $enrolledUsers->pluck('id_user')->toArray();
                @endphp

                @foreach ($users as $user)
                    {{-- tampilkan hanya user yang belum ikut kelas --}}
                    @if(!in_array($user->id, $enrolledUserIds))
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-tambah">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </form>
</div>


{{-- Hapus Peserta --}}
<div class="content-card">
    <h2 class="section-title">Hapus Peserta dari Kelas</h2>

    <form action="{{ route('admin.classes.enroll.remove', $class->id_class) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label class="form-label">Peserta Terdaftar</label>
            <select name="id" class="form-select" required>
                <option value="">Pilih Peserta</option>

                @foreach ($enrolledUsers as $en)
                    <option value="{{ $en->id_user }}">{{ $en->user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn-hapus">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</div>


        </div>

        {{-- Side Tips --}}
        <div class="col-lg-4">
            <div class="content-card small-muted">
                <strong>Tip:</strong> Status kelas "Selesai" otomatis menutup pendaftaran peserta.
            </div>
        </div>

    </div>

    <div class="footer">
        © 2025 Skena Aktor. All rights reserved.
    </div>
</div>

@endsection
