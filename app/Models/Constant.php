<?php

namespace App\Models;

use App\Constants\CoachStatusConstant;
use App\Constants\CourseTypeConstant;
use App\Constants\CurrencyConstant;
use App\Constants\FileTypeConstant;
use App\Constants\GenderConstant;
use App\Constants\LanguageConstant;
use App\Constants\StudyTypeConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;

    /**
     * @var
     */
    public $id;
    public $study_types = StudyTypeConstant::STUDY_TYPES;
    public $course_types = CourseTypeConstant::COURSE_TYPES;
    public $currency = CurrencyConstant::CURRENCY;
    public $file_types = FileTypeConstant::FILE_TYPES;
    public $gender = GenderConstant::GENDER;
    public $languages = LanguageConstant::LANGUAGES;
    public $coach_statuses = CoachStatusConstant::COACH_STATUSES;
}
