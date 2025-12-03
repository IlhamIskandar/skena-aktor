<!doctype html>
<html lang="id">
<head>
    @include('admin.partials.head')
</head>

<body>
<div class="app">
    <!-- Top Navigation -->
    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

        <!-- Main Content -->
    <main class="main-content">
        {{-- HALAMAN --}}
        @yield('content')
    </main>

</div>

{{-- JS GLOBAL --}}
{{-- <script>
    {!! file_get_contents(base_path('resources/raw/admin-global.js')) !!}
</script> --}}
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Pages
        const kelasListPage = document.getElementById('kelasListPage');
        const aturKelasPage = document.getElementById('aturKelasPage');

        // Buttons
        const tambahKelasBtn = document.getElementById('tambahKelasBtn');
        const kembaliKeManajemenBtn = document.getElementById('kembaliKeManajemenBtn');
        const selesaiBtn = document.getElementById('selesaiBtn');
        const backBtn = document.getElementById('backBtn');

        // Show Atur Kelas Page
        tambahKelasBtn.addEventListener('click', function() {
            kelasListPage.classList.add('hidden');
            aturKelasPage.classList.remove('hidden');
        });

        // Back to Manajemen Kelas
        kembaliKeManajemenBtn.addEventListener('click', function() {
            aturKelasPage.classList.add('hidden');
            kelasListPage.classList.remove('hidden');
        });

        // Selesai Button
        selesaiBtn.addEventListener('click', function() {
            const namaKelas = document.getElementById('namaKelas').value;
            const tanggalMulai = document.getElementById('tanggalMulai').value;
            const durasi = document.getElementById('durasi').value;
            const instruktur = document.getElementById('instruktur').value;

            if (namaKelas && tanggalMulai && durasi && instruktur) {
                alert('✓ Kelas berhasil disimpan!\n\n' +
                      'Nama Kelas: ' + namaKelas + '\n' +
                      'Tanggal Mulai: ' + tanggalMulai + '\n' +
                      'Durasi: ' + durasi + '\n' +
                      'Instruktur: ' + instruktur);

                // Reset form and go back
                document.getElementById('kelasForm').reset();
                aturKelasPage.classList.add('hidden');
                kelasListPage.classList.remove('hidden');
            } else {
                alert('Mohon lengkapi semua data kelas!');
            }
        });

        // Back button in navbar
        backBtn.addEventListener('click', function() {
            if (!aturKelasPage.classList.contains('hidden')) {
                aturKelasPage.classList.add('hidden');
                kelasListPage.classList.remove('hidden');
            } else {
                alert('Kembali ke dashboard');
            }
        });

        // Class card click
        document.querySelectorAll('.class-card').forEach(card => {
            card.addEventListener('click', function() {
                kelasListPage.classList.add('hidden');
                aturKelasPage.classList.remove('hidden');

                // You can populate form with class data here
            });
        });
    </script>
</body>
</html>
