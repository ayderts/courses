<?php

namespace Database\Seeders\data\fakes;

use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = CourseProgram::where(['name' => "test course program name"])->first();

        Lesson::firstOrNew([ // данные дублируются
            'name' => 'test lesson name',
            'lesson_description' => 'test lesson description',
            'video_url' => 'test video url',
            'date' => Carbon::now(),
            'time_from' => Carbon::now(),
            'time_to' => Carbon::now(),
            'course_id' => $course->id,
        ])->save();
    }
}
