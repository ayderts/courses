<?php

namespace App\Services;

use App\Http\Requests\HomeworkAnswerStoreRequest;
use App\Models\Course;
use App\Models\File;
use App\Models\Homework;
use App\Models\HomeworkAnswer;
use App\Models\HomeworkAnswerFile;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonService
{

    public function show($course_id, $lesson_id)
    {
        $course = Course::findOrFail($course_id);
        $lesson = Lesson::findOrFail($lesson_id);
        return Lesson::query()->with(['coach', 'material', 'homework'])->findOrFail($lesson->id);
    }

    public function getMark($course_id, $lesson_id): ?int
    {
        $course = Course::findOrFail($course_id);
        $lesson = Lesson::findOrFail($lesson_id);
        $user = auth('api')->user();
        if (empty($lesson->homework)) abort(404);
        $homeworkStudentMark = $lesson->homework->marks()->where('user_id', $user->id)->first();
        return !empty($homeworkStudentMark) ? $homeworkStudentMark->mark : null;
    }
}
