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
            $table->id();
            $table->string('judul')->nullable();
            $table->string('slug')->unique();
            $table->longText('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('harga')->nullable();
            $table->string('kategori')->nullable();
            $table->string('jumlah')->nullable();
            $table->timestamps();
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