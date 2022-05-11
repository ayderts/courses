<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HandbookAuditorium extends Model
{
    protected $table = 'handbook_auditoriums';

    use HasFactory, SoftDeletes;

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'auditorium_id');
    }
}
