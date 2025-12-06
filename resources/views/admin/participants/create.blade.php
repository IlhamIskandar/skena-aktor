@extends('layouts.admin')
@section('title', 'Tambah Peserta — Skena Aktor')

@section('content')

<div class="container-fluid p-0">

    <div class="card border-0 rounded-4 mb-4 bg-warning shadow-sm">
        <div class="card-body p-4">
            <h2 class="fw-bold mb-1">Tambah Peserta Baru</h2>
            <p class="mb-0 opacity-75">Lengkapi formulir di bawah untuk mendaftarkan akun peserta.</p>
        </div>
    </div>

    <div class="card border-1 shadow-sm rounded-4">
        <div class="card-body p-4">

            <a href="{{ route('admin.participants.index') }}"
               class="btn btn-light mb-3 fw-medium">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Peserta
            </a>

            <form action="{{ route('admin.participants.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Nama --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required placeholder="Masukkan email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- No Telepon --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">No Telepon</label>
                        <input type="text" name="no_telp" class="form-control"
                               value="{{ old('no_telp') }}" placeholder="Contoh: 08123456789">
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Role Pengguna</label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="">Pilih Role</option>
                            <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
                            <option value="member" {{ old('role')=='member'?'selected':'' }}>Member</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               required placeholder="Minimal 6 karakter">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control" required placeholder="Tulis ulang password">
                    </div>

                </div>

                <button type="submit" class="btn btn-warning fw-bold w-100 mt-2 text-dark">
                    <i class="bi bi-check-circle"></i> Simpan User
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
