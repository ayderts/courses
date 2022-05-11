<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeworkAnswerMarkRequest;
use App\Models\HomeworkStudentMark;
use App\Models\Lesson;
use App\Models\User;
use App\Services\CoachHomeworkService;

class HomeworkFeedbackController extends Controller
{
    public CoachHomeworkService $coachHomeworkService;

    public function __construct(CoachHomeworkService $coachHomeworkService)
    {
        $this->coachHomeworkService = $coachHomeworkService;
    }

    public function storeMark(StoreHomeworkAnswerMarkRequest $request, $lesson_id, $student_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $user = User::findOrFail($student_id);
        if ($request->has('mark')) {
            $homeworkStudentMark = HomeworkStudentMark::query()->create([
                'mark' => $request->input('mark'),
                'user_id' => $user->id,
                'homework_id' => $lesson->homework->id,
            ]);
            if (!empty($homeworkStudentMark)) {
                return response(['data' => ['mark' => $homeworkStudentMark->mark]]);
            }
        }
        return abort(429);
    }

//    public function show($homework_id): AnonymousResourceCollection
//    {
//        $feedback = $this->homeworkService->showHomeworkFeedback($homework_id);
//        if (is_null($feedback)) {
//            return abort(404);
//        }
//        return AuthUserHomeworkFeedbackResourceOLD::collection($feedback);
//    }

}
