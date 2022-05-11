<?php

namespace App\Http\Resources;

use App\Models\Lesson;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonCourseScoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     *  @var Lesson $this
     */
    public function toArray($request)
    {
        return [
            'lesson_id' => $this->id,
            'lesson_name' => $this->name,
            'number' => $this->number,
            'homework_mark' => $this->homework_mark,
            'test_score' => $this->test_score,
            'attendance' => $this->attendance,
        ];
    }
}
