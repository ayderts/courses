<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class CourseGroup extends Model
{
    use HasFactory, PositionTrait, SoftDeletes;

    const STUDENT_ROLE_ID = 4;

    protected $fillable = [
        'group_name',
        'number_of_students',
        'active',
        'position',
        'course_id',
        'program_id',
        'coach_id',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_group_student', 'course_group_id', 'user_id')->where('role_id', self::STUDENT_ROLE_ID);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function getTitleWithCourseAttribute(): string
    {
        $courseName = $this->course !== null ? $this->course->name : '';
        $groupName = $this->group_name ?? '';
        return "{$courseName}| {$groupName}";
    }

    public function getDateFromAttribute(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

    public function getLessonsWithHomeworkAttribute()
    {
        return $this->lessons()->sorted('DESC')->with('homework')->has('homework')->get();
    }
}
