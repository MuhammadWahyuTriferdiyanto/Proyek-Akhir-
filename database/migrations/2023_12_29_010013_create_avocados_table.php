<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avocados', function (Blueprint $table) {
            $table->id();
            $table->string('no')->unique();
            $table->string('nama');
            $table->string('gambar'); // Ganti 'image' dengan 'string'
            $table->text('keterangan');
            $table->decimal('berat', 8, 2);
            $table->decimal('harga', 12, 2);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avocados');
    }
};
