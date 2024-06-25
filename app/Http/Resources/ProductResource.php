<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'product' => $this->name,
            'description' => $this->description,
            'image' => $this->getImageUrl(),
            'price' => $this->price,
            'user_id' => $this->user_id,
        ];
    }

    /**
     * Get the URL of the product image.
     *
     * @return string|null
     */
    private function getImageUrl(): ?string
    {
        if ($this->photo) {
            return Storage::url($this->photo);
        }
        return null;
    }
}
