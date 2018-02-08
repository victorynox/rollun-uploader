<?php


namespace rollun\TuckerRocky\Decoders;

use InvalidArgumentException;
use rollun\TuckerRocky\Decoders\Enums;

class LineDecoder
{
    const SCHEMA_KEY_START = "start";

    const SCHEMA_KEY_LENGTH = "length";

    const SCHEMA_KEY_TYPE = "type";

    const SCHEMA_KEY_ENUM = "enum";

    private $debugMode = false;

    /**
     * @var array
     * Parsing schema
     */
    protected $schema;

    /**
     * LineDecoder constructor.
     * @param array $schema
     * @param bool $debugMode
     */
    public function __construct(array $schema, $debugMode = false)
    {
        $this->schema = $schema;
        $this->debugMode = $debugMode;
    }

    /**
     * @param $line
     * @return array
     * @throws UnknownFieldTypeException
     */
    public function decode(string $line)
    {
        $itemData = [];
        if (empty($line)) {
            return [];
        }

        foreach ($this->schema as $key => $params) {
            //cut value from line
            $value = substr($line, $params[static::SCHEMA_KEY_START], $params[static::SCHEMA_KEY_LENGTH]);

            switch ($params["type"]) {
                case "string":break;
                case "int":
                    $value = intval($value);
                    break;
                case "float":
                    $value = floatval($value);
                    break;
                case "date":
                    // usually the date from price row looks like "MMDDYY", f.e. "091917"
                    $value = preg_replace("/(\d{2})(\d{2})(\d{2})/", "$2-$1-20$3", $value);
                    break;
                case "enum":
                    if (!isset($params[static::SCHEMA_KEY_ENUM])) {
                        throw new InvalidArgumentException("For the enum type an enumeration array is required");
                    }
                    /** @var Enums\BasicEnum $class */
                    $class = $params[static::SCHEMA_KEY_ENUM];
                    $constantName = !empty($value) ? $value : "EMPTY";

                    if(!$class::isValidName($constantName) && $this->debugMode) {
                        $value = "PARSER_UNDEFINED";
                        break;
                    }
                    $value = constant("$class::$constantName");
                    break;
                default:
                    throw new UnknownFieldTypeException("Unknown field type \"{$params['type']}\"");
            }
            $itemData[$key] = $value;
        }
        return $itemData;
    }

    public function __sleep()
    {
        return [
            "schema", "debugMode"
        ];
    }


}