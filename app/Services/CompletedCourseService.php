<?php

namespace App\Services;
use App\Models\CompletedCourse;
use App\Models\Course;

class CompletedCourseService {

    public function completedCourses() {
        return CompletedCourse::all();
    }
}



