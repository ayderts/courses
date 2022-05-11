<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class SurveyQuestion extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
