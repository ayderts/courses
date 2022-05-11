<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class TestQuestion extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = ['name', 'test_id', 'position'];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(TestAnswer::class);
    }

    public function getHasMultipleCorrectAnswersAttribute(): bool
    {
        return $this->answers()->where('is_correct', '=', true)->count() > 1;
    }
}
