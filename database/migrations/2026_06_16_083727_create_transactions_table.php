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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi')->unique();
            $table->string('kode_pegawai');
            $table->string('kode_cabang');
            $table->date('tanggal_transaksi');
            $table->decimal('total', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('kode_pegawai')
                ->references('kode_pegawai')
                ->on('employees')
                ->onDelete('cascade');

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
        Schema::dropIfExists('transactions');
    }
};
