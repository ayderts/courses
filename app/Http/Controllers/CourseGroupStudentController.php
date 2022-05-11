<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoachLessonResource;
use App\Http\Resources\CoachResource;
use App\Models\Coach;
use App\Models\CourseGroup;
use App\Models\Lesson;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class CourseGroupStudentController extends Controller
{   public function __construct(AttendanceService $attendanceService)
    {
        $this->middleware('auth:api');
        $this->attendanceService = $attendanceService;
    }
    public function show(Request $request){
        return CoachLessonResource::make($this->attendanceService->showAttendance($request));
    }
}
