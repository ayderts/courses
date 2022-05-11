<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachHomeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student = User::findOrFail($request->route('student_id'));
        $answers = $this->answers()->with('feedback')->where('user_id', $student->id)->get();
        return [
            'answers' => CoachHomeworkAnswerResource::collection($answers),
            'student' => StudentShortInfoResource::make($student),
            'coach' => CoachResource::make($this->lesson->coach),
        ];
    }
}
