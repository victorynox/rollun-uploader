<?php

namespace rollun\TuckerRocky;

use IteratorAggregate;

class EncodedFileIteratorAggregate implements IteratorAggregate
{

    protected $file;

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }
}