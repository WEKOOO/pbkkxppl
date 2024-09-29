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
        Schema::create('example', function (Blueprint $table) {
            $table->id(); // Auto-increment ID (Number)
            $table->string('nama'); // String
            $table->integer('umur'); // Number
            $table->enum('status', ['active', 'inactive']); // Enum
            $table->date('registered_at'); // Date
            $table->boolean('is_verified'); // Boolean
            $table->timestamps(); // Created and updated timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('example');
    }
};
