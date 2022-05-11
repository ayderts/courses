<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthHomeworkAnswerResourceOLD extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'homework_id' => $this->homework->id,
            'answer_content' => $this->content ?? '',
            'answer_date' => $this->created_at ? date('d.m.Y H:i:s', strtotime($this->created_at)) : '',
            'lesson_position' => $this->homework->lesson->number,
            'lesson_name' => $this->homework->lesson->name,
            'mark' => $this->homework->currentStudentMark !== null ? $this->homework->currentStudentMark->mark : null,
            'coach_feedback' => $this->whenLoaded('feedback', function () {
                return AuthUserHomeworkFeedbackResourceOLD::make($this->feedback);
            }),
            'student' => StudentShortInfoResource::make($this->student),
            'files' => FileResource::collection($this->filesAsCollection),
        ];
    }
}
