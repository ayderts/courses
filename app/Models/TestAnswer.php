<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class TestAnswer extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = ['name', 'test_question_id', 'is_correct', 'position'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(TestQuestion::class);
    }
}
