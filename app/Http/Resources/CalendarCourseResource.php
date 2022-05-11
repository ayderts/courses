<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalendarCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_name' => $this->getCourseNameAttribute($this->id),
            'lesson_name' => $this->name,
            'lesson_start_date' => date('d.m.Y', strtotime($this->date)),
            'start_time' => date('H:i', strtotime($this->time_from)),
            'end_time' => date('H:i', strtotime($this->time_to)),
            'homework_deadline' => $this->getHomeworkDeadlineAttribute($this->id)
        ];
    }
}
