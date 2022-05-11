<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->imageUrlPath,
            'course_type' => $this->format,
            'study_type' => $this->studyTypeFormat,
            'date_from' => !empty($this->date_from) ? date('d.m.Y', strtotime($this->date_from)) : '',
            'date_to' => !empty($this->date_to) ? date('d.m.Y', strtotime($this->date_to)) : '',
            'certificate_url' => '',
            'direction' => !empty($this->handbookDirectionType) ? $this->handbookDirectionType->name : '',
            'groups' => GroupResource::collection($this->groups),
        ];
    }
}
