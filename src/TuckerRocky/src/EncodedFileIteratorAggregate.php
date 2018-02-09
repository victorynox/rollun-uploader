<?php

namespace rollun\TuckerRocky;

use IteratorAggregate;
use rollun\TuckerRocky\Decoders\LineDecoder;

class EncodedFileIteratorAggregate implements IteratorAggregate
{
    /**
     * @var string
     */
    protected $filePath;

    /** @var LineDecoder */
    protected $decoder;

    /**
     * EncodedFileIteratorAggregate constructor.
     * @param LineDecoder $decoder
     * @param $filePath
     */
    public function __construct(LineDecoder $decoder, $filePath)
    {
        $this->decoder = $decoder;
        $this->filePath = $filePath;
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return EncodedFileIterator
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new EncodedFileIterator($this->decoder, $this->filePath);
    }
}