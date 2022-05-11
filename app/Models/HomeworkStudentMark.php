<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeworkStudentMark extends Model
{
    use HasFactory;

    protected $fillable = ['mark', 'user_id', 'homework_id'];
    protected $table = 'homework_student_mark';

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function homework(): BelongsTo
    {
        return $this->belongsTo(Homework::class);
    }

    public function getPassDateAttribute(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }
}
