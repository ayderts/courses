<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class HomeworkAnswerFileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //TODO FIX FILE LINK
        return [
            'file_url' => !empty($this->file) ? Storage::url($this->file->file_path) : '',
            'original_name' => !empty($this->file->name)
        ];
    }
}
