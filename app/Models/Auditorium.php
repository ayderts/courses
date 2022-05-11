<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auditorium extends Model
{
    protected $table = 'auditoriums';

    use HasFactory, SoftDeletes;

    public function handbookAuditorium(): BelongsTo
    {
        return $this->belongsTo(HandbookAuditorium::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(CourseGroups::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coordinator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
