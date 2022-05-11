<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClosestLessonsRequest;
use App\Http\Resources\CalendarLessonResource;
use App\Http\Resources\UserAuthHomeworkAnswerResourceOLD;
use App\Http\Resources\AuthUserLessonResourceOLD;
use App\Models\Course;
use App\Models\HomeworkAnswer;
use App\Models\Lesson;
use App\Services\LessonService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LessonController extends Controller
{
    public LessonService $lessonService;
    const NUMBER_OF_CLOSEST_LESSONS = 2;

    /**
     * @param LessonService $lessonService
     */
    public function __construct(LessonService $lessonService)
    {
        $this->middleware('auth:api');
        $this->lessonService = $lessonService;
    }


    public function show(Request $request, $course_id, $lesson_id): AuthUserLessonResourceOLD
    {
        return AuthUserLessonResourceOLD::make($this->lessonService->show($course_id, $lesson_id));
    }

    public function indexAnswer(Request $request, $course_id, $lesson_id): AnonymousResourceCollection
    {
        $user = auth('api')->user();
        $course = Course::find($course_id);
        $lesson = Lesson::find($lesson_id);
        return UserAuthHomeworkAnswerResourceOLD::collection(HomeworkAnswer::query()->with('feedback')->where('user_id', $user->id)->where('homework_id', $lesson->homework->id)->get());
    }

    public function showMark(Request $request, $course_id, $lesson_id)
    {
        $mark = $this->lessonService->getMark($course_id, $lesson_id);
        return response(['data' => ['mark' => $mark]]);
    }

    public function closestLessons(ClosestLessonsRequest $request): AnonymousResourceCollection
    {
        return CalendarLessonResource::collection(auth('api')->user()->getClosestFutureLessons($request->has('number') ? $request->input('number') : self::NUMBER_OF_CLOSEST_LESSONS));
    }

}
