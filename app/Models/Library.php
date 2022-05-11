<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use HasFactory, SoftDeletes;

    public function handbookLibraryAuthor(): BelongsTo
    {
        return $this->belongsTo(HandbookLibraryAuthor::class);
    }

    public function handbookLibraryCategory(): BelongsTo
    {
        return $this->belongsTo(HandbookLibraryCategory::class);
    }

    public function handbookLibraryPublisher(): BelongsTo
    {
        return $this->belongsTo(HandbookLibraryPublisher::class);
    }
}
