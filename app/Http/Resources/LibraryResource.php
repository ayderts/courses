<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LibraryResource extends JsonResource
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
            'description' => $this->description ?? '',
            'page_number' => $this->page_number ?? '',
            'image_url' => $this->image_url ?? '',
            'files_url' => $this->files_url,
            'published_at'=>date('d.m.Y', strtotime($this->published_at)),
            'author' => $this->handbookLibraryAuthor->only(['id','name']),
            'category' => $this->handbookLibraryCategory->only(['id','name','parent_id']),
            'publisher' => $this->handbookLibraryPublisher->only(['id','name']),
        ];
    }
}
