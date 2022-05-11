<?php

namespace App\Http\Resources;

use App\Constants\FileTypeConstant;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MaterialResource extends JsonResource
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
            'name' => $this->name ?? '',
            'description' => $this->description ?? '',
            'lesson_id' => $this->lesson->id,
            'lesson_name' => $this->lesson->name,
            'lesson_position' => $this->lesson->number,
            'lesson_description' => $this->lesson->description,
            'files' => FileResource::collection($this->filesAsCollection),
            'file_type' => $this->type,
            'created_at' => $this->created_at ? date('d.m.Y H:i:s', strtotime($this->created_at)) : '',
        ];
    }
}
