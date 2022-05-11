<?php

namespace App\Services;

use App\Http\Requests\CalendarIndexRequest;
use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\returnArgument;

class CalendarService
{

    public function lesson(CalendarIndexRequest $request)
    {
        $lessons = Collection::make();
        if ($request->exists('year') && $request->exists('month') && $request->exists('day')) {
            $year = $request->get('year');
            $month = $request->get('month');
            $day = $request->get('day');
            $full_date = $year . '-' . $month . '-' . $day;
            $lessons = Lesson::query()->where('date', '=', $full_date);
        }
        return $lessons;
    }

    public function index(CalendarIndexRequest $request): Collection
    {
        $user = auth('api')->user();
        $lessons = Collection::make();
        $groups = ($request->has('group_id'))
            ? CourseGroup::where('id', $request->input('group_id'))->get()
            : ($request->has('course_id') && (!$request->has('group_id'))
                ? Course::find($request->input('course_id'))->groups
                : (!empty($user->coach) ? $user->coach->groups : $user->groups));
        foreach ($groups as $group) {
            $ls = $group->lessons()->when(($request->has('date_from') && $request->has('date_to')), function ($query) use ($request) {
                $query->whereBetween('date', [$request->input('date_from'), $request->input('date_to')]);
            })->get();
            $lessons = $lessons->merge($ls);
        }
        return $lessons->sortBy('date');
    }
}

