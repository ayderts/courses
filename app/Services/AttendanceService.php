<?php

namespace App\Services;

use App\Http\Resources\CoachResource;
use App\Models\Attendance;
use App\Models\Coach;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\TestQuestion;

class AttendanceService
{
    public function store($request){
        $user = auth('api')->user();
        $lesson = Lesson::find($request->lesson_id);
        $coach = Coach::where('user_id',$user['id'])->first();
        $requestData = array_merge($request->all(),['coach_id'=>$coach->id,'date'=>$lesson->date]);
        if(Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->where('attendance',$request->attendance)->exists()){
            return Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->where('attendance',$request->attendance)->first();
        }
        elseif(Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->exists()){
            $attendance = Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->first();
            if($request->attendance!=$attendance){
             $updated_attendance =  Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->update($requestData);
             return Attendance::where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->first();
            }
        }
        return Attendance::create($requestData);
    }
    public function show($request){
        $user = auth('api')->user();
        $coach = Coach::where('user_id',$user['id'])->first();
        return Attendance::where('coach_id',$coach->id)->where('lesson_id',$request->lesson_id)->get();
    }
    public function showAttendance($request){
             $user = auth('api')->user();
            $coach = Coach::where('user_id',$user['id'])->first();
            return Coach::with('lessons.group.course')->with('lessons.group.students')->whereHas('lessons', function($q) use ($request) {
                $q->where('date',$request->date);
            })->find($coach->id);
    }
}
