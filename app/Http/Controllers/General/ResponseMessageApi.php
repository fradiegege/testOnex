<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\Main\GlobalConstants;

class ResponseMessageApi extends Controller
{
    protected $general = GlobalConstants::MENS[000] ;
    public function responseApi($code,$result=[]) {
           
        return response()->json([
            'Inf'=>$this->general,
            'res'=> GlobalConstants::MENS[$code][0],
            'cod'=> $code,'mes'=> GlobalConstants::MENS[$code][1] ,
            'det' => GlobalConstants::MENS[$code][2],
            'data'=>$result], $code);
    }       
}
