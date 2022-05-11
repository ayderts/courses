<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IHomeworkResource extends JsonResource
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
            'deadline' => $this->deadline,
            'is_test' => !empty($this->test),
            'test_id' => !empty($this->test) ? $this->test->id : 0,
            'files' => FileResource::collection($this->filesAsCollection),
        ];
    }
}
