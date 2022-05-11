<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date_from = Carbon::instance($this->faker->dateTimeBetween('-1 months', '+1 months'));
        $date_to = Carbon::instance($this->faker->dateTimeBetween('+1 months', '+2 months'));
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'date_from' => $date_from,
            'date_to' => $date_to,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
