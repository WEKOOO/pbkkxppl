<?php

// database/factories/StudentProgressFactory.php
namespace Database\Factories;
use App\Models\StudentProgress;
use App\Models\Module;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentProgressFactory extends Factory
{
    protected $model = StudentProgress::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Assumes you have a User factory
            'module_id' => Module::factory(),
            'exam_id' => Exam::factory(),
            'score' => $this->faker->optional()->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['not_started', 'in_progress', 'completed']),
            'completed_at' => $this->faker->optional()->dateTime,
        ];
    }
}