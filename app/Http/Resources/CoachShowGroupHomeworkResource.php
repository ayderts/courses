<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachShowGroupHomeworkResource extends JsonResource
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
            'name' => $this->group_name,
            'course_id' => $this->course->id,
            'course_name' => $this->course->name,
            'lessons' => CoachGroupHomeworkLessonResource::collection($this->lessonsWithHomework),
        ];
    }
}
