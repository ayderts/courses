<?php

namespace Database\Seeders\data\fakes;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = Lesson::where(['name' => 'test lesson name'])->first();

        Test::firstOrNew([ // данные дублируются
            'name' => 'test1',
            'questions_number' => 5,
            'attempts_number' => 3,
            'time_amount' => 60,
            'lesson_id' => $lesson->id,
        ])->save();
    }
}
