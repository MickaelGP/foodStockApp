<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->_id,
            'code' => $this->code,
            'product_name' => $this->product_name,
            'categories' => $this->categories,
            'brands' => $this->brands,
            'image_url' => $this->image_url
        ];
    }
}
