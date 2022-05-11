<?php

namespace Database\Factories;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $deadline = now()->addDays(rand(1, 100))->addMinutes(rand(1, 1440));
        return [
            'name' => $this->faker->text(15),
            'description' => $this->faker->text(50),
            'test_deadline' => $deadline,
            'time_amount' => rand(60,120),
            'questions_number' => 25,
            'attempts_number' => 3,
            'homework_id' => Homework::query()->with('test')->doesntHave('test')->pluck('id')->random(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
