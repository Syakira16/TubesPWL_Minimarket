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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('kode_pegawai')->primary();
            $table->string('kode_cabang');
            $table->string('nama_pegawai');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();

            $table->timestamps();

            $table->foreign('kode_cabang')
                ->references('kode_cabang')
                ->on('branches')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
