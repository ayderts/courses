<?php

namespace Database\Seeders\data\fakes;

use App\Models\Course;
use App\Models\CourseProgram;
use Illuminate\Database\Seeder;

class CourseProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::where(['id' => 1])->first();

        CourseProgram::updateOrCreate([ // вызывает ошибку id
            'id' => 1,
            ], [
            'id' => 1,
            'name' => 'test course program name',
            'description' => 'test course program description',
            'course_id' => $course->id,
        ]);
    }
}
