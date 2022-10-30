<?php
namespace App\Constants\Main;

class GlobalConstants
{

    const RESP_OK  = 1;
    const RESP_BAD = 0;
    
    const HTTP = [
                    'Ok'                            => 200,
                    'BadRequest'                    => 400,
                    'ServerError'                   => 500,
                ];
    const MENS = [  000 => 'Prueba Técnica Onexfy',
                    200 => [self::RESP_OK,'Exito',['Operación realizada de forma satisfactoria']],
                    400 => [self::RESP_BAD,'Datos Suministrados no son válidos',['Datos de entrada errados']],
                    500 => [self::RESP_BAD,'Error interno',['Servicio invocado retona error en el servidor']],
                 ];
                      
}
