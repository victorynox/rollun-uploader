<?php


namespace rollun\Uploader;


/**
 * Interface SeekableIterator
 * @package rollun\Uploader
 */
interface SeekableIterator extends \SeekableIterator
{
    /**
     * Seeks to a position
     * @link TODO: add link to doc
     * @param mixed $position <p>
     * The position to seek to.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function seek($position);
}