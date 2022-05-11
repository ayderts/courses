<?php

namespace App\Services;


use App\Http\Requests\HomeworkAnswerStoreRequest;
use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Homework;
use App\Models\HomeworkAnswer;
use App\Models\HomeworkAnswerFile;
use App\Models\HomeworkFeedback;
use App\Models\User;
use Doctrine\DBAL\Query\QueryException;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JWTAuth;


class HomeworkService
{
    const HOMEWORK_ANSWERS_RELATIVE_PATH = 'homework_answers';

    public function storeAnswer(HomeworkAnswerStoreRequest $request, $course_id, $lesson_id)
    {
        //TODO check if course_id matches lesson_id
        $course = Course::findOrFail($course_id);
        $user = auth('api')->user();
        $homework = Homework::query()->where('lesson_id', $lesson_id)->firstOrFail();
        $homeworkAnswer = HomeworkAnswer::create(['homework_id' => $homework->id, 'content' => $request['content'], 'user_id' => $user->id]);
        if (!empty($request->has('files'))) {
            $filePaths = explode(',', $request->input('files'));
            foreach ($filePaths as $filePath) {
                $file = \App\Models\File::query()->where('file_path', $filePath)->firstOrFail();
                $newPath = self::HOMEWORK_ANSWERS_RELATIVE_PATH . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR . $file->generated_name;
                if (Storage::move($file->file_path, $newPath)) {
                    $file->update(['file_path' => $newPath]);
                }
                HomeworkAnswerFile::create(['homework_answer_id' => $homeworkAnswer->id, 'file_id' => $file->id]);
            }
        }
        return $homeworkAnswer;
    }

}



