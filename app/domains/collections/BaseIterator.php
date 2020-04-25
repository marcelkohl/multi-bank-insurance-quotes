<?php
namespace App\Domain\Collection;

use Iterator;

/**
 * implementation of Iterator for basic behavior on collections
 */
class BaseIterator implements Iterator
{
    /** @var mixed[] */
    private $items = [];

    /**
     * construct
     * @param mixed $items items to be used on the iteraction
     */
    public function __construct($items)
    {
        if (is_array($items)) {
            $this->items = $items;
        }
    }

    /**
     * sets the record pointer to the first item of the array
     */
    public function rewind()
    {
        reset($this->items);
    }


    /**
     * gets current item based on the array pointer
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * gets current key based on the array pointer
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * moves to the next item on the array
     */
    public function next()
    {
        return next($this->items);
    }

    /**
     * returns if the item is valid or not (key = not null and not false)
     */
    public function valid()
    {
        return key($this->items) !== null && key($this->items) !== false;
    }
}
