<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'first_name' => $this->first_name ?? '',
            'last_name' => $this->last_name ?? '',
            'fathers_name' => $this->fathers_name ?? '',
            'email' => $this->email ?? '',
            'fio' => $this->fio ?? '',
            'phone' => $this->phone ?? '',
            'occupation' => $this->occupation ?? '',
            'role' => $this->roleName,
            'birth_date' => !empty($this->birth_date) ? date('d.m.Y', strtotime($this->birth_date)) : '',
            'gender' => $this->gender ?? '',
            'location_city' => $this->location_city ?? '',
            'location_country' => $this->locationCountry->name ?? '',
            'avatar' => $this->avatarImage,
        ];
    }
}
