<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CourseGroup;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AuthUserCourseResourceOLD extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $group = auth('api')->user()->groups->where('course_id', $this->id)->first();
        $this->manager = $group->manager;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'date_from' => !empty($this->date_from) ? date('d.m.Y', strtotime($this->date_from)) : '',
            'date_to' => !empty($this->date_to) ? date('d.m.Y', strtotime($this->date_to)) : '',
            'duration' => $this->duration,
            'image_url' => $this->imageUrlPath,
            'course_type' => $this->format,
            'group_id' => $group->id,
            'group_number' => $group->position,
            'group_name' => $group->group_name,
            'lessons_count' => $group->lessons->count(),
            'lessons_left' => $group->lessons()->futureLessons()->count(),
            'lessons' => CalendarLessonResource::collection($group->lessons()->sorted('ASC')->get()),
            'manager' => ManagerResource::make($this->manager),
        ];
    }

}
