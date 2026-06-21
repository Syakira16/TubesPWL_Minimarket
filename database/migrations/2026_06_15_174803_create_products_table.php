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
        Schema::create('products', function (Blueprint $table) {
            $table->string('kode_barang')->primary();
            $table->string('kode_kategori');
            $table->string('nama_barang');
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->default(0);
            $table->timestamps();

            $table->foreign('kode_kategori')
                ->references('kode_kategori')
                ->on('categories')
                ->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
