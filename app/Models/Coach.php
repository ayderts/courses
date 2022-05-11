<?php

namespace App\Models;

use App\Constants\DurationConstant;
use App\Http\Resources\LessonCoachResource;
use App\Http\Resources\LessonResource;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Coach extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $table = 'coaches';
    protected $fillable = [
        'full_name',
        'job_position',
        'role',
        'personal_phone_number',
        'job_phone_number',
        'email',
        'status',
        'salary',
        'specialization',
        'requisites',
        'languages',
        'scoring',
        'user_id',
        'direction_id',
    ];

    public function handbookDirectionType(): BelongsTo
    {
        return $this->belongsTo(HandbookDirectionType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function getLessons(): AnonymousResourceCollection
    {
        $relevances = $this->lessons()->get();
        return LessonCoachResource::collection($relevances);
    }

    public function homeworkFeedbacks(): HasMany
    {
        return $this->hasMany(HomeworkFeedback::class);
    }

    public function getCoursesAttribute()
    {
        $courses = Course::query()->whereRelation('groups.lessons', 'coach_id', '=', $this->id)->get();
        return $courses;
    }

    public function getGroupsAttribute()
    {
        $groups = CourseGroup::query()->whereRelation('lessons', 'coach_id', '=', $this->id)->get();
        return $groups;
    }
}
