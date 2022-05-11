<?php

namespace App\Http\Resources;

use App\Models\HomeworkStudentMark;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class CoachGroupHomeworkLessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $students = $this->group->students;
        for ($i = 0; $i < $students->count(); $i++) {
            $homeworkStudentMark = HomeworkStudentMark::where('homework_id', $this->homework->id)->where('user_id', $students[$i]->id)->first();
            $students[$i]->studentHomeworkMark = $homeworkStudentMark;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->number,
            'students_number' => $this->group->students->count(),
            'students_passed' => $this->studentsDoneHomework,
            'students' => StudentHomeworkInfoResource::collection($students),
        ];
    }
}
