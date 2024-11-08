<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // Kolom untuk pertanyaan
            $table->foreignId('exam_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel exams
            $table->integer('points')->default(1); // Kolom untuk nilai pertanyaan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
