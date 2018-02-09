<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 10:  'itemsub' (indicates when one item has one or more substitute items - an "old/original" item can be in this file multiple times as it may have multiple substitute items)
 *
 * Class ItemSubstitute
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class ItemSubstitute
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
            "substitute_item" => [
                "start" => 8,
                "length" => 5,
                "type" => "string"
            ]
        ];
    }
}