<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserLessonResourceOLD extends JsonResource
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
            'lesson_id' => $this->id,
            'lesson_name' => $this->name,
            'lesson_description' => $this->lesson_description ?? '',
            'group_name' => $this->group->group_name,
            'course_name' => $this->group->course->name,
            'position' => $this->number,
            'date' => !empty($this->date) ? date('d.m.Y', strtotime($this->date)) : '',
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
            'video_url' => $this->video_direct_url,
            'video_web_url' => $this->video_web_url ?? '',
            'homework_deadline' => !empty($this->homework) ? $this->homework->deadline : '',
            'material' => $this->whenLoaded('material', function () {
                return MaterialResource::make($this->material);
            }),
            'coach' => $this->whenLoaded('coach', function () {
                return CoachResource::make($this->coach ?? []);
            }),
            'homework' => $this->whenLoaded('homework', function () {
                return AuthUserHomeworkResourceOLD::make($this->homework ?? []);
            }),
        ];
    }
}
