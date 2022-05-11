<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class HomeworkAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'homework_id', 'user_id'];
    private const DOWNLOAD_NAMESPACE_NAME = 'files';

    public function answerFiles(): HasMany
    {
        return $this->hasMany(HomeworkAnswerFile::class);
    }

    public function homework(): BelongsTo
    {
        return $this->belongsTo(Homework::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function feedback(): HasOne
    {
        return $this->hasOne(HomeworkFeedback::class, 'homework_answer_id');
    }

    public function getFilesAsCollectionAttribute(): \Illuminate\Support\Collection
    {
        $files = Collection::make();
        if (!empty($this->answerFiles)) {
            foreach ($this->answerFiles as $answerFile) {
                $filePath = $answerFile->file->file_path;
                $files->push((object)[
                    'file_extension' => $this->fileExtensionFromPath($filePath),
                    'file_url' => $this->filePublicUrlFromPath($answerFile->file->id),
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

    public function filePublicUrlFromPath(int $id, int $objectIndex = null): string
    {
        return route('download.get', ['namespace' => self::DOWNLOAD_NAMESPACE_NAME, 'id' => $id, 'index' => $objectIndex]);
    }

    public function fileSizeFromPath(string $filePath): int
    {
        return Storage::size($filePath);
    }
}
