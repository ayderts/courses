<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Spatial;

class Contact extends Model
{
    use HasFactory, SoftDeletes, PositionTrait, Spatial;

    protected $spatial = [
        'map',
    ];

    protected $casts = [
        'phones' => 'array',
        'schedule' => 'array',
    ];

    public function locationCity(): BelongsTo
    {
        return $this->belongsTo(LocationCity::class);
    }
}
