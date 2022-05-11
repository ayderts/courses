<?php

namespace App\Models;

use App\Constants\CourseTypeConstant;
use App\Constants\DurationConstant;
use App\Constants\StudyTypeConstant;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Facades\Voyager;

class Course extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'erp_id',
        'name',
        'description',
        'price',
        'date_from',
        'date_to',
        'course_type',
        'study_type',
        'currency',
        'has_certificate',
        'homework_number',
        'test_number',
        'handbook_direction_type_id',
    ];

    private $defaultImage = 'courses/default.png';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function handbookDirectionType(): BelongsTo
    {
        return $this->belongsTo(HandbookDirectionType::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function coachGroups(): HasMany
    {
        return $this->hasMany(CourseGroup::class)->whereRelation('lessons', 'coach_id', '=', auth('api')->user()->coach->id);
    }

    public function completed(): HasOne
    {
        return $this->hasOne(CompletedCourse::class, 'name');
    }

    /** Accessors */
    public function getImageUrlPathAttribute(): string
    {
        return $this->image_url !== null ? Voyager::image($this->image_url) : Voyager::image($this->defaultImage);
    }

    /**
     * @return string
     * duration - поле, возвращает разницу date_to - date_from
     * @throws Exception
     */
    public function getDurationAttribute(): string
    {
        $date_to = new DateTime($this->date_to);
        $date_from = new DateTime($this->date_from);
        $interval = $date_from->diff($date_to);
        $days = $interval->days;
        $months = ceil($days / 30);
        return $months . ' ' . DurationConstant::DURATION_MONTHS[$months];
    }

    public function getNumberOfCompletedLessonsAttribute($courseId): int
    {
        $number_of_completed_lessons = 0;
        $current_date = Carbon::now()->format('Y-m-d');

        $lessons = Lesson::all()->where('course_id', $courseId);
        foreach ($lessons as $lesson) {
            if (strtotime($lesson->date) == strtotime($current_date)) {
                if (strtotime($lesson->time_to) < strtotime(Carbon::now()->format('H:i:s'))) {
                    $number_of_completed_lessons++;
                }
            } else if (strtotime($lesson->date) < strtotime($current_date)) {
                $number_of_completed_lessons++;
            }
        }

        return $number_of_completed_lessons;
    }

    public function getFormatAttribute(): string
    {
        return CourseTypeConstant::COURSE_TYPES[$this->course_type];
    }

    public function getTestHomeworkNumberAttribute(): int
    {
        return $this->lessons()->with('test')->has('test')->count();
    }

    public function getStudyTypeFormatAttribute()
    {
        return StudyTypeConstant::STUDY_TYPES[$this->study_type];
    }
}
