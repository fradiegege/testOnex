<?php
namespace App\Http\Controllers\Variant;

use Validator;
use App\Models\Products;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\Main\GlobalConstants;
use App\Http\Resources\VariantResource;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Controllers\General\ResponseMessageApi;

class ReadController extends Controller
{
    public function read(Request $request)
    {
      $code   =  GlobalConstants::HTTP['Ok'];
      $result = [];
      
      $variants = Variants::where('id',$request->id)->with('products')->get();
      if(count($variants) == 0){
        $code   =  GlobalConstants::HTTP['BadRequest'];
      };
      return (new ResponseMessageApi)->responseApi($code,$variants);
      
    }
    
}
