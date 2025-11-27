<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id('id_class');
            $table->string('nama_kelas');
            $table->text('deskripsi')->nullable();
            $table->string('tutor')->nullable();
            $table->text('jadwal_kelas')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('max_peserta')->default(0);
            $table->timestamp('create_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
