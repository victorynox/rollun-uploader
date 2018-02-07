<?php


namespace rollun\TuckerRocky\Decoders;


abstract class PriceSchema
{
    static public function getSchema()
    {
        return [
            "item" => [
                "start" => 1,
                "length" => 6,
                "type" => "string"
            ],
            "description" => [
                "start" => 7,
                "length" => 30,
                "type" => "string"
            ],
            "status" => [
                "start" => 37,
                "length" => 1,
                "type" => "enum",
                "enum" => Enums\Status::class
            ],
            "hazardous" => [
                "start" => 38,
                "length" => 1,
                "type" => "enum",
                "enum" => Enums\Hazardous::class
            ],
            "standardPrice" => [
                "start" => 39,
                "length" => 8,
                "type" => "float"
            ],
            "bestPrice" => [
                "start" => 47,
                "length" => 8,
                "type" => "float"
            ],
            "TuckerRockySellUom" => [
                "start" => 55,
                "length" => 2,
                "type" => "enum",
                "enum" => Enums\UnitOfMeasurement::class
            ],
            "retailPrice" => [
                "start" => 57,
                "length" => 8,
                "type" => "float"
            ],
            "retailUom" => [
                "start" => 65,
                "length" => 2,
                "type" => "enum",
                "enum" => Enums\UnitOfMeasurement::class
            ],
            "retailToSellConvFactor" => [
                "start" => 67,
                "length" => 6,
                "type" => "float"
            ],
            "weight" => [
                "start" => 73,
                "length" => 6,
                "type" => "float"
            ],
            "length" => [
                "start" => 79,
                "length" => 6,
                "type" => "float"
            ],
            "width" => [
                "start" => 85,
                "length" => 6,
                "type" => "float"
            ],
            "height" => [
                "start" => 91,
                "length" => 6,
                "type" => "float"
            ],
            "cube" => [
                "start" => 97,
                "length" => 6,
                "type" => "float"
            ],
            "newSegment" => [
                "start" => 103,
                "length" => 4,
                "type" => "enum",
                "enum" => Enums\SegmentUnitOfMeasurement::class
            ],
            "newCategory" => [
                "start" => 107,
                "length" => 10,
                "type" => "string"
            ],
            "newSubcategory" => [
                "start" => 117,
                "length" => 30,
                "type" => "string"
            ],
            "brand" => [
                "start" => 147,
                "length" => 30,
                "type" => "string"
            ],
            "modelWithinBrand" => [
                "start" => 177,
                "length" => 60,
                "type" => "string"
            ],
            "primaryColor" => [
                "start" => 237,
                "length" => 6,
                "type" => "string"
            ],
            "secondaryColor" => [
                "start" => 243,
                "length" => 30,
                "type" => "string"
            ],
            "colorPattern" => [
                "start" => 273,
                "length" => 1,
                "type" => "enum",
                "enum" => Enums\ColorPatter::class
            ],
            "sizeGender" => [
                "start" => 274,
                "length" => 1,
                "type" => "enum",
                "enum" => Enums\SegmentUnitOfMeasurement::class
            ],
            "size" => [
                "start" => 275,
                "length" => 20,
                "type" => "string"
            ],
            "sizeModifier" => [
                "start" => 295,
                "length" => 1,
                "type" => "enum",
                "enum" => Enums\SizeModifier::class
            ],
            "vendorPart" => [
                "start" => 296,
                "length" => 30,
                "type" => "string"
            ],
            "application" => [
                "start" => 326,
                "length" => 55,
                "type" => "string"
            ]
        ];
    }
}
