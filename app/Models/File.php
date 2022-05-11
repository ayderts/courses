<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_path',
        'generated_name'
    ];

    public function homeworkAnswerFile(): HasOne
    {
        return $this->hasOne(File::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function getGeneratedNameAttribute(): string
    {
        return substr($this->file_path, strrpos($this->file_path, DIRECTORY_SEPARATOR) + 1);
    }

    public function getOriginalNameAttribute(): ?string
    {
        return $this->name;
    }


}
