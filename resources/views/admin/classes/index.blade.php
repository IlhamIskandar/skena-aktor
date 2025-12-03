@extends('layouts.admin')
@section('title', 'Classes — Skena Aktor')

@section('content')

<div id="kelasListPage">

    <!-- Header -->
    <div class="header-section">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8">
                <h1 class="page-title">Manajemen Kelas</h1>
                <p class="page-subtitle">Atur Kelas, Jadwal, dan Pendaftaran</p>
            </div>

            <div class="col-lg-4 text-end">
                {{-- Route resource name = classes.create --}}
                <a class="btn-primary-custom" href="{{ route('admin.classes.create') }}">
                    <i class="bi bi-plus-circle"></i> Tambah Kelas Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="search-filter mb-4 d-flex gap-2">
        <input type="text" class="form-control search-box" placeholder="Cari Kelas...">
        <select class="form-select" style="max-width: 200px;">
            <option>Semua Status</option>
            <option value="upcoming">Mendatang</option>
            <option value="ongoing">Berlangsung</option>
            <option value="finished">Selesai</option>
        </select>
    </div>

    <div class="row">

    @forelse ($classes as $class)

        @php
            $enrolled = $class->enrollments->count() ?? 0;
            $capacity = $class->max_participant ?? 0;
            $progress = $capacity > 0 ? ($enrolled / $capacity * 100) : 0;
        @endphp

        <div  class="col-lg-6 mb-4 ">
            <div class="class-card">

                <div class="class-header">
                    <div>
                        <h3 class="class-title">{{ $class->name }}</h3>

                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.classes.edit', $class->id_class) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.classes.destroy', $class->id_class) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('Yakin ingin menghapus kelas ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                        <div class="d-flex align-items-center gap-2 mt-2">
                            <div class="icon-badge
                                @if($class->status=='upcoming') orange
                                @elseif($class->status=='ongoing') green
                                @else gray @endif">
                                <i class="bi bi-clipboard-check"></i>
                            </div>

                            <span class="class-status text-black">
                                @if($class->status=='upcoming')
                                    Mendatang
                                @elseif($class->status=='ongoing')
                                    Berlangsung
                                @else
                                    Selesai
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="class-info">
                    <div class="info-item">
                        <i class="bi bi-people-fill"></i>
                        <span><strong>Peserta:</strong> {{ $enrolled }} / {{ $capacity }}</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-calendar3"></i>
                        <span>
                            <strong>Tanggal Mulai:</strong>
                            {{ $class->start_date ? \Carbon\Carbon::parse($class->start_date)->format('d-m-Y') : 'Belum dijadwalkan' }}
                        </span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>
                            <strong>Durasi:</strong>
                            {{ $class->duration_weeks }} minggu
                        </span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-currency-dollar"></i>
                        <span>
                            <strong>Biaya:</strong>
                            Rp {{ number_format($class->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <div class="class-instructor">
                    <div class="instructor-label">Instruktur</div>
                    <div class="instructor-name">{{ $class->mentor ?? '-' }}</div>
                </div>

                <div class="class-progress">
                    <div class="progress-label">
                        <span class="progress-text">Progress Kelas</span>
                        <span class="progress-count">
                            {{ $enrolled }} Terdaftar / {{ $capacity }} Kapasitas
                        </span>
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: {{ $progress }}%"></div>
                    </div>
                </div>
            </div>
        </div>

    @empty

        <div class="col-12 text-center py-4">
            <p>Belum ada kelas.</p>
        </div>

    @endforelse

</div>


    <!-- Footer -->
    <div class="footer">
        © 2025 Skena Aktor. All rights reserved.
    </div>

</div>

@endsection
