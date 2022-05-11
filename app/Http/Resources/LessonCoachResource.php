<?php

namespace App\Http\Resources;

use App\Models\Lesson;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonCoachResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @var Lesson $this
     */
    public function toArray($request)
    {
        return [
            'lesson_id' => $this->id,
            'lesson_name' => $this->name,
            'lesson_description' => $this->lesson_description ?? '',
            'group_name' => $this->group->group_name,
            'course_name' => $this->group->course->name,
            'position' => $this->position,
            'date' => !empty($this->date) ? date('d.m.Y', strtotime($this->date)) : '',
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
            'students' => StudentCoachResource::collection($this->group->students),
        ];
    }
}
