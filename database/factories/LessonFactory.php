<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Course;
use App\Models\CourseGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $time_from = date('H:i', rand(1, 27000));
        $time_to = date('H:i', rand(27000, 54000));
        return [
            'name' => $this->faker->title(),
            'lesson_description' => $this->faker->text(),
            'course_group_id' => CourseGroup::pluck('id')->random(),
            'coach_id' => Coach::pluck('id')->random(),
            'price' => $this->faker->randomDigit(),
            'date' => $this->faker->date(),
            'time_from' => $time_from,
            'time_to' => $time_to,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
