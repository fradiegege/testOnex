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
                    'id'            => $this->id,
                    'name'          => $this->name,
                    'referer'       => $this->referer,
                    'descriptions'  => $this->descriptions,
                    'price'         => $this->price,
                    'created_at'    => (string) $this->created_at,
                    'updated_at'    => (string) $this->updated_at,
                    
            ]
            ;
    }
}
