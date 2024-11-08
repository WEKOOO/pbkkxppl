<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_choices_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel questions
            $table->string('choice'); // Kolom untuk pilihan jawaban
            $table->boolean('is_correct')->default(false); // Kolom untuk menandai jawaban yang benar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('choices');
    }
}