<?php

namespace App\Http\Controllers\Product;

use App\Models\Products;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\General\ResponseMessageApi;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        try {
            $code   =  GlobalConstants::HTTP['Ok'];
            $result = [];
            
            $product = Products::find($request->id);
            if(is_null($product)){
                $code   =  GlobalConstants::HTTP['BadRequest'];
            }else{
                Variants::where('product_id',$request->id)->delete();
                Products::where('id',$request->id)->delete();
            };

            return (new ResponseMessageApi)->responseApi($code,$product);
        } catch (\Throwable $th) {
            $code   =  GlobalConstants::HTTP['ServerError'];
            return (new ResponseMessageApi)->responseApi($code);
        }
      
      
    }
}


