<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClosestCourseResource;
use App\Models\Course;
use App\Services\ClosestCourseService;
use Illuminate\Http\Request;

class ClosestCourseController extends Controller
{
    private ClosestCourseService $closestCourseService;
    public function __construct(ClosestCourseService $closestCourseService) {
        $this->closestCourseService = $closestCourseService;
    }

    public function index() {
        return ClosestCourseResource::collection($this->closestCourseService->allCourses());
    }
}
