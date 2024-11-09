<?php

// database/factories/ExamFactory.php
namespace Database\Factories;
use App\Models\Exam;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'passing_score' => $this->faker->numberBetween(50, 100),
            'duration' => $this->faker->numberBetween(30, 180), // in minutes
            'module_id' => Module::factory(), // Creates a Module if none exists
        ];
    }
}
