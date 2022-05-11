<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;

class Homework extends Model
{
    protected $table = 'homeworks';
    protected $fillable = ['name', 'description', 'lesson_id', 'homework_deadline', 'file_url', 'position',];
    const DOWNLOAD_NAMESPACE_NAME = 'homeworks';

    use HasFactory, SoftDeletes, PositionTrait;

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function test(): HasOne
    {
        return $this->hasOne(Test::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(HomeworkAnswer::class);
    }

    public function currentUserAnswers(): HasMany
    {
        return $this->hasMany(HomeworkAnswer::class)->where('user_id', auth('api')->user()->id);
    }

    public function getGroupAttribute()
    {
        return $this->lesson->group;
    }

    public function marks(): HasMany
    {
        return $this->hasMany(HomeworkStudentMark::class, 'homework_id');
    }

    public function getFilesAsCollectionAttribute(): \Illuminate\Support\Collection
    {
        $files = Collection::make();
        if (!empty($this->file_url)) {
            $filesJson = json_decode($this->file_url);
            foreach ($filesJson as $key => $fileJson) {
                $filePath = $fileJson->download_link;
                $files->push((object)[
                    'file_extension' => $this->fileExtensionFromPath($filePath),
                    'file_url' => $this->filePublicUrlFromPath($this->id, $key),
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

    public function filePublicUrlFromPath(int $id, int $objectIndex): string
    {
        return route('download.get', ['namespace' => self::DOWNLOAD_NAMESPACE_NAME, 'id' => $id, 'index' => $objectIndex]);
    }

    public function fileSizeFromPath(string $filePath): int
    {
        return Storage::size($filePath);
    }

    public function getDeadlineAttribute()
    {
        return date('d.m.Y H:i:s', strtotime("{$this->homework_deadline} {$this->homework_deadline_time}"));
    }
}
