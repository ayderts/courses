<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CoachController extends Controller
{

    public function indexCourses(Request $request)
    {
        $coach = auth('api')->user()->coach;
        if (!is_null($coach)) {
            return CourseResource::collection(Course::with(['groups' => function ($q) use ($coach) {
                $q->with(['lessons' => function ($q) use ($coach) {
                    $q->where('coach_id', '=', $coach->id);
                }]);
            }])->get());
        }
        return abort(404);
    }
}
