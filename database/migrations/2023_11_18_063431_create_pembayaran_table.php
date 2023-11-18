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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->bigInteger('penyewaan_id')->unsigned();
            $table->integer('total_bayar');
            $table->integer('bayar');
            $table->integer('kembalian');
            $table->integer('denda')->default(0);
            $table->timestamps();

            $table->foreign('penyewaan_id')->references('id_penyewaan')->on('penyewaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
