<?php

namespace App\Http\Controllers\Variant;

use Validator;
use App\Models\Products;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\VariantResource;
use App\Http\Requests\Variant\UpdateRequest;
use App\Http\Controllers\General\ResponseMessageApi;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        $code   =  GlobalConstants::HTTP['Ok'];
        $result = [];
        $validator = Validator::make($request->all(), (new UpdateRequest)->rules($request));
        if ($validator->fails()) {
            $code     = GlobalConstants::HTTP['BadRequest'];
            $result   = $validator->errors();
            return (new ResponseMessageApi)->responseApi($code,$result);
        }
       
        $variant = Variants::find($request->id);
     
        if(is_null($variant)){
            $code   =  GlobalConstants::HTTP['BadRequest'];
            return (new ResponseMessageApi)->responseApi($code,$variant);
        };

        if ($request->has('referer')) {
            $variant->referer = $request->referer;
        }
        if ($request->has('descriptions')) {
            $variant->descriptions = $request->descriptions;
        }
        if ($request->has('price')) {
            $variant->price = $request->price;
        }
        if ($request->has('product_id')) {
            $variant->price = $request->product_id;
        }
        $variant->save();
        return (new ResponseMessageApi)->responseApi($code,new VariantResource($variant));
      
    }
}
