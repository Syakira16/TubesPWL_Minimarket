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
        Schema::create('transaction_details', function (Blueprint $table) {
              $table->id();
              $table->unsignedBigInteger('transaction_id');
              $table->string('kode_barang');
              $table->integer('qty');
              $table->decimal('harga',12,2);
              $table->decimal('subtotal',12,2);
              $table->timestamps();

              $table->foreign('transaction_id')
              ->references('id')
              ->on('transactions')
              ->onDelete('cascade');

              $table->foreign('kode_barang')
              ->references('kode_barang')
              ->on('products')
              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
