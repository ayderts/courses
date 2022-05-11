<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price',];

    public function locationCity(): BelongsTo
    {
        return $this->belongsTo(LocationCity::class);
    }

    public function handbookYear(): BelongsTo
    {
        return $this->belongsTo(HandbookYear::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(CourseGroup::class);
    }
}
