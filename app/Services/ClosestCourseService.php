<?php

namespace App\Services;
use App\Models\Course;

class ClosestCourseService {

    public function allCourses() {
        return Course::all();
    }
}
