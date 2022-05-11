<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentHomeworkInfoResource extends JsonResource
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
            'first_last_name' => $this->first_last_name,
            'passed' => !empty($this->studentHomeworkMark),
            'avatar' => $this->avatar_image,
            'pass_date' => $this->studentHomeworkMark !== null ? $this->studentHomeworkMark->pass_date : null,
        ];
    }
}
