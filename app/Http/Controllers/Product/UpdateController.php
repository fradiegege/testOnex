<?php

namespace App\Http\Controllers\Product;

use Validator;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Controllers\General\ResponseMessageApi;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        try {
            $code   =  GlobalConstants::HTTP['Ok'];
            $result = [];
            $validator = Validator::make($request->all(), (new UpdateRequest)->rules($request));
            if ($validator->fails()) {
                $code     = GlobalConstants::HTTP['BadRequest'];
                $result   = $validator->errors();
                return (new ResponseMessageApi)->responseApi($code,$result);
            }
        
            $product = Products::find($request->id);
        
            if(is_null($product)){
                $code   =  GlobalConstants::HTTP['BadRequest'];
                return (new ResponseMessageApi)->responseApi($code,$product);
            };

            if ($request->has('name')) {
                $product->name = $request->name;
            }
            if ($request->has('referer')) {
                $product->referer = $request->referer;
            }
            if ($request->has('descriptions')) {
                $product->descriptions = $request->descriptions;
            }
            if ($request->has('price')) {
                $product->price = $request->price;
            }
            $product->save();
            return (new ResponseMessageApi)->responseApi($code,new ProductResource($product));
        } catch (\Throwable $th) {
            $code   =  GlobalConstants::HTTP['ServerError'];
           return (new ResponseMessageApi)->responseApi($code);
        }
      
    }
}
