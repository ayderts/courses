<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachHomeworkAnswerResource extends JsonResource
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
            'content' => $this->content ?? '',
            'created_at' => $this->created_at ? date('d.m.Y H:i:s', strtotime($this->created_at)) : '',
            'homework_id' => $this->homework->id,
            'lesson_position' => $this->homework->lesson->number,
            'lesson_name' => $this->homework->lesson->name,
            'coach_feedback' => $this->whenLoaded('feedback', function () {
                return HomeworkFeedbackResource::make($this->feedback);
            }),
            'files' => FileResource::collection($this->filesAsCollection),
        ];
    }
}
