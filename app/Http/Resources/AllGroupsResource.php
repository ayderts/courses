<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\CourseGroup;
use Illuminate\Http\Resources\Json\JsonResource;

class AllGroupsResource extends JsonResource
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
            'courses' => CourseListResource::collection($this),
            'courses_with_groups' => CourseListResource::collection(Course::query()->with('groups')->has('groups')->get()),
        ];
    }
}
