<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeworkAnswerStoreRequest;
use App\Http\Resources\UserAuthHomeworkAnswerResourceOLD;
use App\Services\HomeworkService;
use JWTAuth;

class HomeworkController extends Controller
{
    public HomeworkService $homeworkService;

    public function __construct(HomeworkService $homeworkService)
    {
        $this->middleware('auth:api');
        $this->homeworkService = $homeworkService;
    }

    public function storeAnswer(HomeworkAnswerStoreRequest $request, $course_id, $lesson_id): UserAuthHomeworkAnswerResourceOLD
    {
        return UserAuthHomeworkAnswerResourceOLD::make($this->homeworkService->storeAnswer($request, $course_id, $lesson_id));
    }
}
