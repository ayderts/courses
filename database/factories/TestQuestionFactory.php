<?php

namespace Database\Factories;

use App\Models\Homework;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'test_id' => Test::query()->withCount('questions')->get()->where('questions_count', '<', 10)->random()->id,
        ];
    }
}
