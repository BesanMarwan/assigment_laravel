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
            'id'         =>$this->id,
            'name'       =>$this->name,
            'slug'       =>$this->slug,
            'description'=>$this->description,
            'price'      =>$this->price,
            'quantity'   =>$this->quantity,
            'category_id'=>$this->category_id,
            'image_path' =>$this->image_path,
        ];
//        return parent::toArray($request);
    }
}
