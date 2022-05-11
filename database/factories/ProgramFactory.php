<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date_from = Carbon::instance($this->faker->dateTimeBetween('-1 months', '+1 months'));
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
