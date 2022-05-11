<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Manager extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    public function groups(): HasMany
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /* Accessor */
    public function getFullNameAttribute(): string
    {
        return "{$this->user->last_name} {$this->user->first_name} {$this->user->fathers_name}";
    }

    public function getRoleDisplayNameAttribute(): string
    {
        return $this->user->role->display_name;
    }
}

