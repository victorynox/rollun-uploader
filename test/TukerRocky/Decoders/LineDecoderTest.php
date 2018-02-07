<?php


use rollun\TuckerRocky\Decoders\LineDecoder;

use PHPUnit\Framework\TestCase;
use rollun\TuckerRocky\Decoders\Enums;

class LineDecoderTest extends TestCase
{
    protected $object;

    public function setUp()
    {

    }

    public function decodeSimple()
    {
        return [
            [
                [
                    "string" => [
                        "start" => 0,
                        "length" => 6,
                        "type" => "string"
                    ],
                    "int" => [
                        "start" => 6,
                        "length" => 3,
                        "type" => "int"
                    ],
                    "float" => [
                        "start" => 9,
                        "length" => 5,
                        "type" => "float",
                    ],
                ],
                "string12345.43",
                [
                    "string" => "string",
                    "int" => 123,
                    "float" => 45.43
                ]
            ],
            [
                [
                    "status_e" => [
                        "start" => 0,
                        "length" => 1,
                        "type" => "enum",
                        "enum" => Enums\Status::class
                    ],
                ],
                "C",
                [
                    "status_e" => Enums\Status::C,
                ]
            ],
            [
                [
                    "status_e" => [
                        "start" => 0,
                        "length" => 1,
                        "type" => "enum",
                        "enum" => Enums\Status::class
                    ],
                ],
                "D",
                [
                    "status_e" => Enums\Status::D,
                ]
            ],
        ];
    }

    /**
     * @param $schema
     * @param $line
     * @param $expectedItem
     * @throws \rollun\TuckerRocky\Decoders\UnknownFieldTypeException
     * @dataProvider decodeSimple
     */
    public function testDecoderSuccess($schema, $line, $expectedItem)
    {
        $this->object = new LineDecoder($schema);
        $item = $this->object->decode($line);
        $this->assertEquals($expectedItem, $item);

    }
}
