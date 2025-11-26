<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id('id_certificate');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_class');
            $table->boolean('verified')->default(false);
            $table->string('file_path')->nullable();
            $table->string('code_certificate', 100)->unique()->nullable();
            $table->date('issued_date')->nullable();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_class')->references('id_class')->on('classes')->onDelete('cascade');

            $table->index('id_user');
            $table->index('id_class');
            $table->index('code_certificate');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};