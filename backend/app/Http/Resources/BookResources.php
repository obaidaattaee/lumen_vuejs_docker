<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
{
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'auther' => $this->auther,
            'isbn' => $this->isbn,
            'published_at' => $this->published_at,
            'price' => $this->price,
            'sold' => $this->sold,
        ];
    }
}
