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
        Schema::create('penyerahancabangs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('nama_cabang');
            $table->foreign('nama_cabang')->references('id')->on('mcabangs');
            $table->unsignedBigInteger('nama_aset');
            $table->foreign('nama_aset')->references('id')->on('masets');
            $table->string('satuan');
            $table->bigInteger('jumlah');
            $table->bigInteger('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyerahancabangs');
    }
};
