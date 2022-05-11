<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeworkFeedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'file_url',
        'user_id',
        'homework_answer_id',
        'coach_id',
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function homeworkAnswer(): BelongsTo
    {
        return $this->belongsTo(HomeworkAnswer::class, 'homework_answer_id');
    }
}
