<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HandbookNewsTag extends Model
{
    use HasFactory, SoftDeletes;

    public function news(): BelongsToMany
    {
        return $this->belongsToMany('App\News', 'ref_news_handbook_news_tag')
            ->withTimestamps();
    }
}
