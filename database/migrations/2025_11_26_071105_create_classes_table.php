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
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('mentor')->nullable();

            // Jadwal kelas (lebih terstruktur)
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('day_of_week')->nullable(); // contoh: Saturday, Friday
            $table-> integer('duration_weeks')->nullable(); // Durasi kelas dalam minggu

            // Informasi kelas
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('max_participant')->default(0);

            // Status kelas
            $table->enum('status', ['upcoming', 'ongoing', 'finished'])
                ->default('upcoming');

            $table->timestamps();
            $table->softDeletes(); // untuk mengelola penghapusan admin
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
