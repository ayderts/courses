<?php

namespace Database\Seeders\data\fakes;

use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Database\Seeder;

class TestQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = Test::where(['name' => 'test1'])->first();

        TestQuestion::firstOrNew([ // данные дублируются
            'name' => 'question1',
            'test_id' => $test->id,
        ])->save();
    }
}
