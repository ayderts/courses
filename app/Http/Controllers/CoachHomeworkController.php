<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Resources\CoachHomeworkCourseResource;
use App\Http\Resources\CoachHomeworkResource;
use App\Http\Resources\IHomeworkResource;
use App\Http\Resources\UserAuthHomeworkAnswerResourceOLD;
use App\Http\Resources\LessonWithHomeworkResource;
use App\Http\Resources\CoachShowGroupHomeworkResource;
use App\Models\File;
use App\Models\Homework;
use App\Services\CoachHomeworkService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class CoachHomeworkController extends Controller
{
    public CoachHomeworkService $coachHomeworkService;
    public const HOMEWORKS_PATH = 'homeworks';

    public function __construct(CoachHomeworkService $coachHomeworkService)
    {
        $this->middleware('auth:api');
        $this->coachHomeworkService = $coachHomeworkService;
    }

    public function showLessonWithHomework(Request $request, $lesson_id): LessonWithHomeworkResource
    {
        return LessonWithHomeworkResource::make($this->coachHomeworkService->showLessonWithHomework($request, $lesson_id));
    }

//    public function indexStudentAnswer(Request $request, $lesson_id, $student_id): CoachStudentHomeworkAnswerResource
//    {
//        return CoachStudentHomeworkAnswerResource::make($this->coachHomeworkService->indexStudentAnswer($request, $lesson_id, $student_id));
//    }

    public function showStudentAnswer(Request $request, $lesson_id, $student_id)
    {
        return CoachHomeworkResource::make($this->coachHomeworkService->showStudentAnswer($request, $lesson_id, $student_id));
    }

    public function storeHomework(StoreHomeworkRequest $request): IHomeworkResource
    {
        $file_url = null;
        if (!empty($request->input('file'))) {
            $file = File::query()->where('file_path', $request->input('file'))->firstOrFail();
            $newPath = self::HOMEWORKS_PATH . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR . $file->generated_name;
            if (Storage::move($file->file_path, $newPath)) {
                $file->update(['file_path' => $newPath]);
                $file_url = [
                    'file_url' => json_encode([(object)[
                        'download_link' => $file->file_path,
                        'original_name' => $file->name,
                    ]])
                ];
            }
        }
        return IHomeworkResource::make(Homework::query()->create($request->except(['course_id', 'group_id', 'files']) + $file_url));
    }

    public function showGroup(Request $request, $group_id): CoachShowGroupHomeworkResource
    {
        $group = $this->coachHomeworkService->showGroup($request, $group_id);
        return CoachShowGroupHomeworkResource::make($group);
    }

    public function showStudentMark(Request $request, $lesson_id, $student_id)
    {
        $mark = $this->coachHomeworkService->getMark($lesson_id, $student_id);
        return response(['data' => ['mark' => $mark]]);
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $coach = auth('api')->user()->coach;
        return CoachHomeworkCourseResource::collection($coach->courses);
    }
}
