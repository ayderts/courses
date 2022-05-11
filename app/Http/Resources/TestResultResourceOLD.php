<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestResultResourceOLD extends JsonResource
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
            'test_id' => $this->test_id,
            'user_id' => $this->user_id,
            'score' => $this->score ?? '',
            'is_passed' => $this->is_passed ?? '',
            'date'=> date('d.m.Y H:i:s', strtotime($this->created_at)),
          //  'test' => $this->test ?? '',
            'test' => $this->whenLoaded('test', function () {
                return TestResourceOLD::make($this->test);
            }),


        ];
    }
}
