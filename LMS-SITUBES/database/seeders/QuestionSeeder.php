<?php

// database/seeders/QuestionSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::factory()->count(50)->create();
    }
}
