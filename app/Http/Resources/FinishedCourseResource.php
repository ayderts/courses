<?php

namespace App\Http\Resources;

use App\Models\CompletedCourse;
use App\Models\Course;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FinishedCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $group = auth('api')->user()->groups->where('course_id', $this->id)->first();
        $this->manager = $group->manager;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->imageUrlPath,
            'course_type' => $this->format,
            'group_name' => $group->group_name,
            'date_from' => !empty($this->date_from) ? date('d.m.Y', strtotime($this->date_from)) : '',
            'date_to' => !empty($this->date_to) ? date('d.m.Y', strtotime($this->date_to)) : '',
            'result' => 0,
            'certificate_url' => '',
        ];
    }
}
