<?php

namespace App\Services;

use App\Models\CompletedCourse;
use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Lesson;
use App\Models\User;
use DB;
use Ramsey\Collection\Collection;
use Symfony\Component\HttpFoundation\Request;

class CourseService
{

    public function show($courseId)
    {
        return Course::find($courseId);
    }

    public function index()
    {
        return Course::all();
    }

    public function finishedCourses()
    {
        $user = auth('api')->user();
        return $user->finishedCourses;
    }

    public function userCourses()
    {
        $user = auth('api')->user();
        return $user->activeCourses;
    }
    public function courseProgress($course_id){
        $present = 'Посетил';
        $user = auth('api')->user();
        $course_homeworks = DB::table('courses')
            ->join('course_groups', 'courses.id', '=', 'course_groups.course_id')
            ->join('lessons','course_groups.id','=','lessons.course_group_id')
            ->join('homeworks','lessons.id','=','homeworks.lesson_id')
            ->join('homework_student_mark','homeworks.id','=','homework_student_mark.homework_id')
            ->select('homework_student_mark.*')
            ->where('courses.id',$course_id)
            ->where('homework_student_mark.user_id',$user->id)->count();
        $course_tests = DB::table('courses')
            ->join('course_groups', 'courses.id', '=', 'course_groups.course_id')
            ->join('lessons','course_groups.id','=','lessons.course_group_id')
            ->join('homeworks','lessons.id','=','homeworks.lesson_id')
            ->join('tests','homeworks.id','=','tests.homework_id')
            ->join('test_results','tests.id','=','test_results.test_id')
            ->select('test_results.*')
            ->where('courses.id',$course_id)
            ->where('test_results.user_id',$user->id)
            ->where('test_results.is_passed',true)->count();
        $course_attendance = DB::table('courses')
            ->join('course_groups', 'courses.id', '=', 'course_groups.course_id')
            ->join('lessons','course_groups.id','=','lessons.course_group_id')
            ->join('attendance','lessons.id','=','attendance.lesson_id')
            ->select('attendance.*')
            ->where('courses.id',$course_id)
            ->where('attendance.student_id',$user->id)
            ->where('attendance.attendance',$present)->count();
        $course_lessons = DB::table('courses')
            ->join('course_groups', 'courses.id', '=', 'course_groups.course_id')
            ->join('course_group_student', 'course_groups.id', '=', 'course_group_student.course_group_id')
            ->join('lessons','course_groups.id','=','lessons.course_group_id')
            ->select('lessons.*')
            ->where('course_group_student.user_id',$user->id)
            ->count();
        $course = Course::find($course_id);
        $course_score = ['lessons_number' => $course_lessons ,'homeworks_number'=>$course->homework_number,
            'tests_number' => $course->test_number,'lessons_attendance'=>$course_attendance,
            'tests_passed'=>$course_tests,'homeworks_passed'=>$course_homeworks];
        return $course_score;
    }

    public function courseScore($course_id){
        $user = auth('api')->user();
        $userGroups = CourseGroup::join('course_group_student',function($join) use ($user) {
            $join->on('course_groups.id', '=', 'course_group_student.course_group_id')
                ->where('course_group_student.user_id', '=', $user->id);
        })
            ->select('course_groups.id','course_groups.group_name')
            ->where('course_id',$course_id)->first()->only(['id','group_name']);

        $course_score = DB::table('courses')
            ->join('course_groups', 'courses.id', '=', 'course_groups.course_id')
            ->join('lessons',function($join) use ($userGroups) {
                $join->on('course_groups.id', '=', 'lessons.course_group_id')
                    ->where('lessons.course_group_id', '=', $userGroups['id']);
            })
            ->leftJoin('homeworks','lessons.id','=','homeworks.lesson_id')
            ->leftJoin('homework_student_mark',function($join) use($user) {
                $join->on('homeworks.id', '=', 'homework_student_mark.homework_id')
                    ->where('homework_student_mark.user_id', '=', $user->id);
            })
            ->leftJoin('tests','tests.homework_id','=','homeworks.id')
            ->leftJoin('test_results',function($join) use($user) {
                $join->on('test_results.test_id', '=', 'tests.id')
                    ->where('test_results.user_id', '=', $user->id)
                    ->where('test_results.is_passed','=',true);
            })
            ->leftJoin('attendance',function($join) use($user) {
                $join->on('attendance.lesson_id', '=', 'lessons.id')
                    ->where('attendance.student_id', '=', $user->id);
            })
            ->select('lessons.id','lessons.name',DB::raw('coalesce(homework_student_mark.mark,0) as homework_mark'),
                DB::raw('coalesce(test_results.score,0) as test_score'),'attendance.attendance')
            ->where('courses.id',$course_id)
            ->get();

        foreach ($course_score as $key => $score){
            $lesson = Lesson::find($score->id)->number;
            $score->number= $lesson;
        }
        return $course_score;
    }
}



