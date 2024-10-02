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
        Schema::create('masets', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('id_aset');
            $table->string('nama_aset');
            $table->string('kategori');
            $table->unsignedBigInteger('nama_vendor');
            $table->foreign('nama_vendor')->references('id')->on('mvendors');
            $table->string('satuan');
            $table->bigInteger('jumlah');
            $table->bigInteger('harga_satuan');
            $table->bigInteger('harga_total'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masets');
    }
};
