<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClosestCourseResource extends JsonResource
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
            'course_name' => $this->name,
            'lesson_name' => $this->getClosestLessonNameAttribute($this->id),
            'lesson_start_date' => date('d.m.Y', strtotime($this->getDateLessonAttribute($this->id))),
            'start_time' => date('H:i', strtotime($this->getStartTimeLessonAttribute($this->id))),
            'end_time' => date('H:i', strtotime($this->getEndTimeLessonAttribute($this->id))),
            'auditorium_name' => $this->getAuditoriumNameAttribute($this->id)
        ];
    }
}
