<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('peminjaman_id', 16)->primary()->nullable(false);
            $table->string('peminjaman_user_id', 16)->nullable(false);
            $table->date('peminjaman_tglpinjam')->nullable(false);
            $table->date('peminjaman_tglkembali')->nullable(false);
            $table->boolean('peminjaman_statuskembali')->nullable(false);
            $table->string('peminjaman_note', 100)->nullable(false);
            $table->integer('peminjaman_denda')->nullable(false);

            $table->foreign('peminjaman_user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
