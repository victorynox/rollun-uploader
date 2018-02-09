<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 12:  'specialorder' (simply indicates if an item is a "special-order-only" item)
 *
 * Class SpecialOrderOnly
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class SpecialOrderOnly
{
    static public function getSchema()
    {
        return [
            //Old/original Item   1-6
            "special_order_item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
        ];
    }
}