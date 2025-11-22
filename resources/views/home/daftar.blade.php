@extends('layouts.home.app')

@section('content')
<!-- Header Section -->
<section class="registration-header py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="header-title">Pendaftaran</h1>
                <p class="subtitle">
                    Ambil langkah pertama menuju pencapaian bakat Anda. Isi formulir di bawah ini dan kami akan menghubungi Anda untuk membahas detail program yang tepat untuk tujuan Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form Section -->
<section class="registration-form py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-card">
                    <h2 class="form-title">Form Pendaftaran</h2>

                    <form>
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>

                        <!-- Email & Password -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="contoh@email.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Masukkan password">
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="tel" id="nomor_telepon" class="form-control" placeholder="+628123456789">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" class="form-control">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-control">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Catatan Tambahan -->
                        <div class="form-group">
                            <label for="catatan">Catatan (opsional)</label>
                            <textarea id="catatan" class="form-control" rows="3" placeholder="Tuliskan catatan tambahan jika ada"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-submit">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Info Section -->
<section class="payment-info py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="info-title">Informasi Pembayaran</h2>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <!-- Transfer Bank -->
            <div class="col-md-5">
                <div class="payment-box">
                    <div class="payment-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#FFC107" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                    </div>
                    <h3 class="payment-title">Transfer Bank</h3>
                    <p class="payment-desc">Silakan transfer ke rekening bank kami sesuai instruksi yang kami kirimkan via email.</p>
                </div>
            </div>

            <!-- E-Wallet -->
            <div class="col-md-5">
                <div class="payment-box">
                    <div class="payment-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#FFC107" viewBox="0 0 24 24">
                            <path d="M17 1.01 7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z"/>
                        </svg>
                    </div>
                    <h3 class="payment-title">E-Wallet</h3>
                    <p class="payment-desc">Bayar dengan e-wallet favorit Anda seperti OVO, GoPay, atau DANA melalui link pembayaran yang kami kirim.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- After Payment Section -->
<section class="after-payment py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="after-title">Setelah Pembayaran</h2>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <!-- Langkah 1 -->
            <div class="col-md-4">
                <div class="step-box">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Kami akan memproses pendaftaran Anda dalam waktu 24 jam</h3>
                </div>
            </div>

            <!-- Langkah 2 -->
            <div class="col-md-4">
                <div class="step-box">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Kami akan menghubungi Anda untuk membahas detail program</h3>
                </div>
            </div>

            <!-- Langkah 3 -->
            <div class="col-md-4">
                <div class="step-box">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Selesaikan pembayaran dan mulailah perjalanan Anda!</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
