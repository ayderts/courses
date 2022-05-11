<?php

namespace Database\Seeders\data\fakes;

use App\Constants\CourseTypeConstant;
use App\Constants\CurrencyConstant;
use App\Constants\StudyTypeConstant;
use App\Models\Course;
use App\Models\HandbookDirectionType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handbookDirectionType = HandbookDirectionType::where(['name' => 'hr'])->first();

        Course::firstOrNew([ // данные дублируются
            'erp_id' => 1,
            'name' => 'test course name',
            'description' => 'test course description',
            'price' => 20000,
            'date_from' => Carbon::now(),
            'date_to' => Carbon::now(),
            'image_url' => '',
            'course_type' => CourseTypeConstant::ONLINE,
            'study_type' => StudyTypeConstant::INNER,
            'currency' => CurrencyConstant::KZT,
            'handbook_direction_type_id' => $handbookDirectionType->id,
        ])->save();
    }
}
