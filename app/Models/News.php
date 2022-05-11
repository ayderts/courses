<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class News extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    public function handbookNewsTags(): BelongsToMany
    {
        return $this->belongsToMany('App\HandbookNewsTag', 'ref_news_handbook_news_tag')
            ->withTimestamps();
    }
}
