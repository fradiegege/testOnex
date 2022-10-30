<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    use HasFactory;

    protected $table = 'variants';
    
    protected $fillable = [
        'referer',
        'descriptions',
        'price',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasOne('App\Models\Products','id','product_id');
    }
}
