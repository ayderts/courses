<?php

namespace Database\Factories;

use App\Models\Homework;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(10),
            'homework_id' => Homework::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
