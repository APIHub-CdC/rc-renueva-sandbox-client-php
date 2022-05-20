<?php

namespace RcRenueva\Simulacion\Client\Model;
use \RcRenueva\Simulacion\Client\ObjectSerializer;

class CatalogoTipoDomicilio
{
    
    const N = 'N';
    const O = 'O';
    const C = 'C';
    const P = 'P';
    const E = 'E';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::N,
            self::O,
            self::C,
            self::P,
            self::E,
        ];
    }
}
