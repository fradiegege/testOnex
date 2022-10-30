<?php

namespace App\Http\Controllers\Product;

use Validator;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Controllers\General\ResponseMessageApi;

class CreateController extends Controller
{
  
    public function create(Request $request)
    {
      try {
          $code   =  GlobalConstants::HTTP['Ok'];
          $result = [];
          $validator = Validator::make($request->all(), (new CreateRequest)->rules($request));
          if ($validator->fails()) {
              $code     = GlobalConstants::HTTP['BadRequest'];
              $result   = $validator->errors();
              return (new ResponseMessageApi)->responseApi($code,$result);
          }
          $product = Products::create([
                'name' 	        =>	 $request->name,
                'referer' 	    =>	 $request->referer,
                'descriptions' 	=>	 $request->descriptions,
                'price' 	      =>	 $request->price
          ]);

          return (new ResponseMessageApi)->responseApi($code,new ProductResource($product));
      } catch (\Throwable $th) {
            $code   =  GlobalConstants::HTTP['ServerError'];
            return (new ResponseMessageApi)->responseApi($code);
      }
      
      
    }
}
