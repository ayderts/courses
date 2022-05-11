<?php

namespace App\Http\Resources;

use App\Models\Coach;
use App\Models\Lesson;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachLessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @var Coach
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'fathers_name' => $this->user->fathers_name,
            'job_position' => $this->job_position ?? '',
            'email' => $this->user->email ?? '',
            'lessons'=>$this->getLessons(),
            'avatar' => $this->user->avatarImage,
        ];
    }
}
