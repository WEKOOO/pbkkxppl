<?php

// database/factories/QuestionFactory.php
namespace Database\Factories;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'exam_id' => Exam::factory(),
            'points' => $this->faker->numberBetween(1, 5),
        ];
    }
}
