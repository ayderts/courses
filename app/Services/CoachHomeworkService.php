<?php

namespace App\Services;


use App\Models\CourseGroup;
use App\Models\HomeworkAnswer;
use App\Models\HomeworkFeedback;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;


class CoachHomeworkService
{
    public function showLessonWithHomework(Request $request, $lesson_id)
    {
        return Lesson::findOrFail($lesson_id);
    }

    public function showStudentAnswer(Request $request, $lesson_id, $student_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $student = User::findOrFail($student_id);
        return $lesson->homework;
    }

    public function showGroup(Request $request, $group_id)
    {
        return CourseGroup::findOrFail($group_id);
    }

    public function showHomeworkFeedback($homework_id)
    {
        $user = auth('api')->user();
        $homework_answer_id = HomeworkAnswer::where('homework_id', $homework_id)->where('user_id', $user->id)->first();
        $homework_feedback = HomeworkFeedback::where('homework_answer_id', $homework_answer_id->id)->first();
        return $homework_feedback->get();
    }

    public function getMark($lesson_id, $student_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $user = User::find($student_id);
        if (empty($lesson->homework)) abort(404);
        $homeworkStudentMark = $lesson->homework->marks()->where('user_id', $user->id)->first();
        return !empty($homeworkStudentMark) ? $homeworkStudentMark->mark : null;
    }

}



