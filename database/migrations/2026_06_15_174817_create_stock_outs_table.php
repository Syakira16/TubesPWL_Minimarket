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
        Schema::create('stock_outs', function (Blueprint $table) {
            $table->id();
            $table->string('no_barang_keluar')->unique();
            $table->string('kode_barang');
            $table->integer('jumlah');
            $table->date('tanggal_keluar');
            $table->timestamps();

            $table->foreign('kode_barang')
                ->references('kode_barang')
                ->on('products');
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_outs');
    }
};
