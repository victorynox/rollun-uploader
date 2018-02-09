<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 13:  'upcean' (indicates the UPC or EAN code associated with an item)
 *
 * Class ItemUpcAssociated
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class ItemUpcAssociated
{
    static public function getSchema()
    {
        return [
            //Old/original Item   1-6
            "item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Superceded to Item   8-13
            "upcean_code" => [
                "start" => 8,
                "length" => 12,
                "type" => "string"
            ],
            "vendor_part" => [
                "start" => 22,
                "length" => 29,
                "type" => "string"
            ],
            "upc" => [
                "start" => 52,
                "length" => 11,
                "type" => "string"
            ],
        ];
    }
}