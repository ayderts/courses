<?php

namespace App\Models;

use App\Constants\DurationConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Menu extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'title',
        'link'
    ];

    protected $table = 'main_menu';
}
