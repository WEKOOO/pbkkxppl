<?php

// database/factories/ModuleFactory.php
namespace Database\Factories;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    protected $model = Module::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'file_path' => $this->faker->optional()->filePath(),
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
