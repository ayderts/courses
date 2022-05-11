<?php

namespace App\Models;

use App\Constants\FileTypeConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Material extends Model
{
    use HasFactory, SoftDeletes, PositionTrait;

    protected $fillable = [
        'name',
        'description',
        'file_type',  // для file_url нужен будет отдельный endpoint multipart form
        'lesson_id',
        'file_url',
    ];

    private const DOWNLOAD_NAMESPACE_NAME = 'materials';

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    /** Accessors */
    public function getFilesAsCollectionAttribute(): Collection
    {
        $files = Collection::make();
        $filesJson = json_decode($this->file_url);
        foreach ($filesJson as $key => $fileJson) {
            if ($files->count() === 0) {
                $filePath = $fileJson->download_link;
                $files->push((object)[
                    'file_extension' => $this->fileExtensionFromPath($filePath),
                    'file_url' => $this->filePublicUrlFromPath($filePath, $this->id, $key),
                    'file_size' => $this->fileSizeFromPath($filePath),
                ]);
            }
        }
        return $files;
    }

    public function fileExtensionFromPath(string $filePath): string
    {
        $extension = '';
        $extensionPosition = strrpos($filePath, '.');
        if ($extensionPosition) {
            $extension = substr($filePath, $extensionPosition + 1);
        }
        return $extension;
    }

    public function filePublicUrlFromPath(string $filePath, int $id, int $objectIndex): string
    {
        return route('download.get', ['namespace' => self::DOWNLOAD_NAMESPACE_NAME, 'id' => $id, 'index' => $objectIndex]);
    }

    public function fileSizeFromPath(string $filePath): int
    {
        return Storage::size($filePath);
    }

    public function getFileTypeColorAttribute(): string
    {
        if (empty($this->file_type)) {
            return "";
        }
        return FileTypeConstant::FILE_TYPE_COLORS[$this->file_type];
    }

    public function getTypeAttribute(): string
    {
        if (empty($this->file_type)) {
            return "";
        }
        return FileTypeConstant::FILE_TYPES[$this->file_type];
    }
}
