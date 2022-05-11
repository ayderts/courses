<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class CourseProgram extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'name',
        'description',
        'course_id',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
