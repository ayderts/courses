<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->text(),
            'lesson_id' => Lesson::pluck('id')->random(),
            'homework_deadline' => $this->faker->date(),
            'file_url' => $this->faker->url(),
        ];
    }
}
