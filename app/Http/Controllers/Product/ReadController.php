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

class ReadController extends Controller
{
    public function read(Request $request)
    {
      try {
          $code   =  GlobalConstants::HTTP['Ok'];
          $result = [];
          
          $product = Products::where('id',$request->id)->with('variants')->get();
          if(count($product) == 0){
            $code   =  GlobalConstants::HTTP['BadRequest'];
          };
          return (new ResponseMessageApi)->responseApi($code,$product);
      } catch (\Throwable $th) {
          $code   =  GlobalConstants::HTTP['ServerError'];
           return (new ResponseMessageApi)->responseApi($code);
      }
      
      
    }
    
}
