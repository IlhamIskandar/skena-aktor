<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('id_enrollment');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_class');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->integer('progress')->default(0);
            $table->timestamp('enrolled_at')->nullable();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_class')->references('id_class')->on('classes')->onDelete('cascade');

            $table->index('id_user');
            $table->index('id_class');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};