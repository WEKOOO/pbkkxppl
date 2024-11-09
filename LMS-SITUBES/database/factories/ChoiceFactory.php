<?php
// database/factories/ChoiceFactory.php
namespace Database\Factories;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoiceFactory extends Factory
{
    protected $model = Choice::class;

    public function definition()
    {
        return [
            'question_id' => Question::factory(),
            'choice' => $this->faker->sentence,
            'is_correct' => $this->faker->boolean(20), // 20% chance of being correct
        ];
    }
}
