<?php


namespace rollun\TuckerRocky\Decoders\Schema;
use rollun\TuckerRocky\Decoders\Enums;

/**
 * File 5: 'invcloseout' (Inventory for Closeout Items Only)
 * Class InventoryForCloseout
 * @package rollun\TuckerRocky\Decoders\Schema
 */
abstract class InventoryForCloseout
{
    static public function getSchema()
    {
        return [
            "item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Total Inventory Qty          7    (0-9, 9 indicates 9 or more in stock)
            "total_qty" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Drop Ship Inventory Qty      8    (0-9, 9 indicates 9 or more in stock)
            "ds_qty" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            //Drop Ship Availability       9    (Z=Zero,L=Limited,S=Sufficient - this is a rough estimation based on historical sales)
            "ds_availability" => [
                "start" => 1,
                "length" => 6,
                "type" => "enum",
                "enum" => Enums\Availability::class
            ],
            //Non Drop Ship Inventory Qty 10    (0-9, 9 indicates 9 or more in stock)
            "non_ds_qty" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],

        ];
    }

}