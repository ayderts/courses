<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupStudent extends Model
{
    use HasFactory, SoftDeletes;

    public function listeners(): BelongsToMany
    {
        return $this->belongsToMany(CourseListeners::class, 'ref_listeners_group_students')
        ->withTimestamps();
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(CourseGroup::class);
    }
}
