<?php

namespace App\Http\Controllers\Variant;

use Validator;
use App\Models\Products;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\VariantResource;
use App\Http\Requests\Variant\CreateRequest;
use App\Http\Controllers\General\ResponseMessageApi;

class CreateController extends Controller
{
    public function create(Request $request)
    {
      $code   =  GlobalConstants::HTTP['Ok'];
      $result = [];
      $validator = Validator::make($request->all(), (new CreateRequest)->rules($request));
  		if ($validator->fails()) {
          $code     = GlobalConstants::HTTP['BadRequest'];
          $result   = $validator->errors();
          return (new ResponseMessageApi)->responseApi($code,$result);
  		}
     
      $variant = Variants::create([
            'referer' 	    =>	 $request->referer,
            'descriptions' 	=>	 $request->descriptions,
            'price' 	      =>	 $request->price,
            'product_id' 	  =>	 $request->product_id
      ]);

      return (new ResponseMessageApi)->responseApi($code,new VariantResource($variant));
      
    }
}
