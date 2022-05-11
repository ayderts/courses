<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'test_id',
        'score',  // для file_url нужен будет отдельный endpoint multipart form
        'is_passed',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
