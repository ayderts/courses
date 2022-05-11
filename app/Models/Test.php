<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Test extends Model
{
    protected $fillable = [
        'name',
        'description',
        'test_deadline',
        'time_amount',
        'questions_number',
        'attempts_number',
        'homework_id',
        'position',
    ];
    use HasFactory, SoftDeletes, PositionTrait;

    public function homework(): BelongsTo
    {
        return $this->belongsTo(Homework::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }
}
