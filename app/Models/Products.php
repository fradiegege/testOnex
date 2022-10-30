<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'products',
        'name',
        'referer',
        'descriptions',
        'price', 
        'created_at',
        'updated_at'
    ];

    public function variants()
    {
        return $this->hasMany('App\Models\Variants','product_id', 'id');
    }
    
    protected function getProduct($id)
    {
      $product =  Products::find($id);
      return is_null($product)?self::recordNull():$product;
    }

    
}
