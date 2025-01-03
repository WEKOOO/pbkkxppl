<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->integer('sks');
            $table->integer('semester');
            $table->enum('program_studi', ['Teknik Informatika', 'Sistem Informasi']);
            $table->text('deskripsi')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->string('silabus_file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};