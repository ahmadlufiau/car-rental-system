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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_penyewaan');
            $table->string('nota')->nullable();
            $table->datetime('tanggal')->nullable();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('mobil_id')->unsigned();
            $table->integer('lama_rental')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('mobil_id')->references('id_mobil')->on('mobil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
