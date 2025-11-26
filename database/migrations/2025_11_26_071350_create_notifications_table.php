<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_notification');
            $table->unsignedBigInteger('recipient');
            $table->text('message');
            $table->string('platform', 50)->nullable();
            $table->timestamp('created_at')->nullable();

            $table->foreign('recipient')->references('id_user')->on('users')->onDelete('cascade');

            $table->index('recipient');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};