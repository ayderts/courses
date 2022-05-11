<?php

namespace Database\Factories;

use App\Models\HandbookDirectionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'full_name' => $this->faker->name(),
            'job_position' => $this->faker->jobTitle(),
            'role' => $this->faker->jobTitle(),
            'job_phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'type' => $this->faker->title(),
            'salary' => $this->faker->randomDigit(),
            'direction_id' => HandbookDirectionType::pluck('id')->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
