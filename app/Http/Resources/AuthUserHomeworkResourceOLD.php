<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;

class AuthUserHomeworkResourceOLD extends JsonResource
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
            'files' => FileResource::collection($this->filesAsCollection),
            'homework_deadline' => $this->deadline,
            'is_test' => !empty($this->test),
            'test_id' => !empty($this->test) ? $this->test->id : null,
            'answers' => UserAuthHomeworkAnswerResourceOLD::collection($this->currentUserAnswers),
        ];
    }
}
