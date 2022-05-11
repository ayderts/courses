<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_name' => $this->faker->title(),
            'number_of_students' => $this->faker->randomDigit(),
            'active' => $this->faker->boolean(),
            'coach_id' => Coach::pluck('id')->random(),
            'course_id' => Course::pluck('id')->random(),
        ];
    }
}
