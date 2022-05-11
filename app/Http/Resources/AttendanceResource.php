<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'lesson_id' => $this->lesson_id,
            'student_id' => $this->student_id,
            'attendance' => $this->attendance ?? '',
            'coach_id' => $this->coach_id ?? '',
            'date'=> date('d.m.Y', strtotime($this->date)),
            //  'test' => $this->test ?? '',
        ];
    }
}
