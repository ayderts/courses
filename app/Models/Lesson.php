<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Lesson extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'name',
        'lesson_description',
        'date',
        'time_from',
        'time_to',
        'video_url',
        'homework_description',
        'homework_deadline',
        'test_description',
        'test_deadline',
        'course_group_id',
        'coach_id',
    ];

    public function auditorium(): BelongsTo
    {
        return $this->belongsTo(HandbookAuditorium::class, 'auditorium_id');
    }

    public function homework(): HasOne
    {
        return $this->hasOne(Homework::class);
    }

    public function material(): HasOne
    {
        return $this->hasOne(Material::class)->orderBy('id', 'DESC');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(CourseGroup::class, 'course_group_id');
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function getNumberAttribute(): int
    {
        return ($this->group->lessons()->sorted('ASC')->get()->search(function ($l) {
                return $l->id === $this->id;
            }) + 1);
    }

    public function getCourseGroupLessonNameAttribute(): string
    {
        return "{$this->group->course->name}| {$this->group->group_name}| {$this->name}";
    }

    public function getStudentsDoneHomeworkAttribute(): int
    {
        return HomeworkStudentMark::query()->where('homework_id', $this->homework->id)->count();
    }

    public function getVideoDirectUrlAttribute()
    {
        if (!empty($this->video_url)) {
            $json = json_decode($this->video_url);
            if (array_key_exists(0, $json)) {
                $json[0]->download_link = Storage::url($json[0]->download_link);
                return json_encode([$json[0]]);

            }
        }
        return '';
    }

    public function scopeFutureLessons($query)
    {
        return $query->where(DB::raw('date + time_to'), '>', now());
    }

    public function scopeSorted($builder, $way = 'ASC')
    {
        $builder->orderBy(DB::raw('date + time_to'), $way);
    }
}
