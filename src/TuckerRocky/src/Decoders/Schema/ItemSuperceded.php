<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 9:  'itemsuper' (indicates when one item has been superceded by another item - an "old/original" item can at most be in this file once)
 *
 * Class ItemSuperceded
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class ItemSuperceded
{
    static public function getSchema()
    {
        return [
            //Old/original Item   1-6
            "original_item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Superceded to Item   8-13
            "superceded_to_item" => [
                "start" => 8,
                "length" => 5,
                "type" => "string"
            ]
        ];
    }
}