<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeworkAnswerFile extends Model
{
    use HasFactory;

    protected $fillable = ['homework_answer_id', 'file_id'];

    public function homeworkAnswer(): BelongsTo
    {
        return $this->belongsTo(HomeworkAnswer::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    /** Accessors */
    public function getFileOriginalNameAttribute(): string
    {
        return $this->file->name;
    }
}
