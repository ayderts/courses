<?php

namespace App\Http\Controllers;

use App\Http\Resources\FinishedCourseResource;
use App\Http\Resources\LessonCourseScoreResource;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Services\CourseService;
use App\Http\Resources\AuthUserCourseResourceOLD;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;


class CourseController extends Controller
{
    private CourseService $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->middleware('auth:api');
        $this->courseService = $courseService;
    }

    public function finished(): AnonymousResourceCollection
    {
        return FinishedCourseResource::collection($this->courseService->finishedCourses());
    }

    public function indexOfUser(): AnonymousResourceCollection
    {
        return AuthUserCourseResourceOLD::collection($this->courseService->userCourses());
    }
    public function courseProgress($course_id)
    {
        return $this->courseService->courseProgress($course_id);
    }
    public function courseScore($course_id)
    {
        return LessonCourseScoreResource::collection($this->courseService->courseScore($course_id));
    }

    public function showOfUser(Request $request, $id): AuthUserCourseResourceOLD
    {
        $user = auth('api')->user();
        if (!empty($course = $user->courses->where('id', $id)->first())) {
            return AuthUserCourseResourceOLD::make($course);
        }
        return abort(404);
    }
}
