<?php

namespace App\Http\Resources;

use App\Models\Products;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product = Products::where('id',$request->product_id)->get();
        return [
            'id'            => $this->id,
            'referer'       => $this->referer,
            'descriptions'  => $this->descriptions,
            'price'         => $this->price,
            'product'   => $product[0],
            'created_at'    => (string) $this->created_at,
            'updated_at'    => (string) $this->updated_at,
            
        ];
    }
}
