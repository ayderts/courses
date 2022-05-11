<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserHomeworkFeedbackResourceOLD extends JsonResource
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
            'comment' => $this->comment,
            //TODO сделать отображение файлов и возможность загрузить их.
            'files' => [

            ],
            'created_at' => date('d.m.Y H:i:s', strtotime($this->created_at)),
            'coach' => CoachResource::make($this->coach),
        ];
    }
}
