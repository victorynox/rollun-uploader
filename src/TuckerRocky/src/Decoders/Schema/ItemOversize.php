<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 14:  'oversize' (indicates that an item is oversize, though definitions of oversize differ by carrier)
 *
 * Class ItemOversize
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class ItemOversize
{
    static public function getSchema()
    {
        return [
            //Item                 1-6
            "original_item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Oversize code          8 (>=1 is oversize for USPS, >=2 is oversize for UPS, =3 is too large for UPS)
            "oversize_code" => [
                "start" => 8,
                "length" => 1,
                "type" => "enum"
            ]
        ];
    }
}