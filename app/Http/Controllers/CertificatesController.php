<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\Classes; // Wajib di-import
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CertificatesController extends Controller
{
    /** Menampilkan Halaman List Sertifikat */
    public function index()
    {
        // 1. Ambil data sertifikat (dengan relasi user dan class)
        // Menggunakan latest() berdasarkan issued_date
        $certificates = Certificates::with(['user', 'class'])
                        ->latest('issued_date')
                        ->paginate(10);

        // 2. Ambil list user untuk dropdown
        $users = User::all();

        // 3. Ambil list kelas untuk dropdown
        $classes_list = Classes::all();

        // 4. Kirim ke View
        return view('admin.certificates.index', compact('certificates', 'users', 'classes_list'));
    }

    /** Proses Simpan & Upload Sertifikat */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'id_user'          => 'required|exists:users,id',
            'id_class'         => 'required|exists:classes,id_class',
            'issued_date'      => 'required|date',
            // Validasi File: Wajib, harus gambar/pdf, max 2MB (2048 KB)
            'certificate_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            // 2. Proses Upload File
            $filePath = null;
            if ($request->hasFile('certificate_file')) {
                // Simpan file ke folder: storage/app/public/certificates
                // Laravel otomatis membuat nama file acak yang unik
                $filePath = $request->file('certificate_file')->store('certificates', 'public');
            }

            // 3. Generate Kode Unik (Untuk referensi)
            $code = 'SKENA-' . date('Y') . '-' . strtoupper(Str::random(6));

            // 4. Simpan Data ke Database
            Certificates::create([
                'id_user'          => $request->id_user,
                'id_class'         => $request->id_class,
                'verified'         => 1, // Otomatis terverifikasi karena upload admin
                'file_path'        => $filePath, // Path file yang baru diupload
                'code_certificate' => $code,
                'issued_date'      => $request->issued_date,
            ]);

            return back()->with('success', 'Sertifikat berhasil diupload dan disimpan!');

        } catch (\Exception $e) {
            // Tangani error jika upload gagal
            return back()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
        }
    }
}
