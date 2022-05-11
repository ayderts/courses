<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalendarLessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'group_name' => $this->group->group_name,
            'program_name' => !empty($this->program) ? $this->program->name : '',
            'course_name' => $this->group->course->name,
            'lesson_description' => $this->description ?? '',
            'position' => $this->number,
            'date' => !empty($this->date) ? date('d.m.Y', strtotime($this->date)) : '',
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
            'video_url' => $this->video_url,
            'is_test' => !empty($this->homework) && !empty($this->homework->test),
            'homework_deadline' => !empty($this->homework) ? $this->homework->deadline : '',
            'coach' => CoachResource::make($this->coach),
            'auditorium_name' => !empty($this->auditorium) ? $this->auditorium->name : '',
        ];
    }
}
