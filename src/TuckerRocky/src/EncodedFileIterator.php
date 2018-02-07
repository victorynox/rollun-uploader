<?php

namespace rollun\TuckerRocky;

class EncodedFileIterator implements \Iterator
{
    /**
     * @var int line number
     */
    protected $position;

    /**
     * @var string file path
     */
    protected $filePath;

    /**
     * @var resource file
     */
    protected $fileIterator;


    /**
     * EncodedFileIterator constructor.
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->fileIterator = new \SplFileObject($this->filePath, "rb");
        $this->position = 0;
    }

    /**
     * @param string $line
     * @return array
     */
    protected function parseLine($line)
    {
        return [];
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $this->fileIterator->seek($this->position);
        if ($this->fileIterator->valid()) {
            $line = trim($this->fileIterator->current());
            return $this->parseLine($line);
        }
        throw new \OutOfRangeException("Fail is invalid");
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        $this->fileIterator->seek($this->position);
        return $this->fileIterator->valid();
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return [
            "position",
            "filePath",
        ];
    }

    public function __wakeup()
    {
        $this->__construct($this->filePath);
    }


}