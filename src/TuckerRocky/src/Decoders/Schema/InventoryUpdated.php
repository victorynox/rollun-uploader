<?php


namespace rollun\TuckerRocky\Decoders\Schema;

/**
 * File 8:  'invupd' (Inventory that is updated multiple times in a day at
 * approximately 6 AM, 1PM and 6 PM central time)
 *
 * Class InventoryUpdated
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class InventoryUpdated
{
    static public function getSchema()
    {
        return [
            "item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Total Inventory Qty    8    (0-9, 9 indicates 9 or more in stock at Tucker Rocky)
            "total_qty" => [
                "start" => 7,
                "length" => 1,
                "type" => "int"
            ],
            //Availability (TX)     10    (0-9, 9 indicates 9 or more in stock in this DC)
            "availability_tx" => [
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
            "availability_ca" => [
                "start" => 14,
                "length" => 1,
                "type" => "int"
            ],
        ];
    }
}