<?php


namespace rollun\TuckerRocky\Decoders\Schema;
use rollun\TuckerRocky\Decoders\Enums;

/**
 * File 2: 'invlist' (Inventory by distribution center/DC) **Also in CSV format as "invlistcsv.csv"**
 * Note:  In order to create more manageable data we have split the
 * invlist file in half and create 2 separate a/b files (invlista &
 * invlistb).  This is the exact same data contained in invlist, just
 * broken down into smaller files.
 * Class InventoryByDistribution
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class InventoryByDistribution
{
    static public function getSchema()
    {
        return [
            "item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            "availability_tx" => [
                "start" => 7,
                "length" => 1,
                "type" => "int"
            ],
            "availability_pa" => [
                "start" => 8,
                "length" => 1,
                "type" => "int"
            ],
            "availability_or" => [
                "start" => 9,
                "length" => 1,
                "type" => "int"
            ],
            "availability_co" => [
                "start" => 10,
                "length" => 1,
                "type" => "int"
            ],
            "availability_fl" => [
                "start" => 11,
                "length" => 1,
                "type" => "int"
            ],
            "availability_il" => [
                "start" => 12,
                "length" => 1,
                "type" => "int"
            ],
            "availability_ignore" => [
                "start" => 13,
                "length" => 1,
                "type" => "int"
            ],
            "availability_ca" => [
                "start" => 14,
                "length" => 1,
                "type" => "int"
            ],
        ];
    }
}