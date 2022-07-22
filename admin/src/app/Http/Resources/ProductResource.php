<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'category_id' => $this->category_id,
            'link_image' => $this->link_image,
            'description' => $this->description,
            'price' => $this->price,
            'favorite' => $this->favorite,
            'status' => $this->status,
            'reduced_price' => $this->reduced_price
        ];
    }
}
