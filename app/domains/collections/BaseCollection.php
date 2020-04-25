<?php
namespace App\Domain\Collection;

use IteratorAggregate;

/**
 * very basic implementation of a collection, with iterator
 */
class BaseCollection implements IteratorAggregate
{
    /** @var mixed[] */
    private $items = [];

    /**
     * exposed method to iteract on whiles/fors
     */
    public function getIterator() {
        return new BaseIterator($this->items);
    }

    /**
     * adds an item into the collection
     *
     * @param mixed $object object to be added to the collection
     * @param mixed $key    optional key as index
     */
    public function add($object, $key = null)
    {
        if ($key == null) {
            $this->items[] = $object;
        } else  {
            $this->items[$key] = $object;
        }
    }

    /**
     * delete and item on the collection based on the key parameter
     * @param  mixed $key   the key which references the object to be deleted
     */
    public function delete($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
    }

    /**
     * get an item of the collection based on the key parameter
     * @param  mixed $key   the key which references the object
     * @return mixed|null   returns the object on the specified key, or null if not found
     */
    public function get($key)
    {
        return isset($this->items[$key]) ? $this->items[$key] : null;
    }

    /**
     * return the keys of the items onteh collection
     * @return mixed[]
     */
    public function keys() {
        return array_keys($this->items);
    }

    /**
     * returns the length of items onteh collection
     * @return int
     */
    public function length()
    {
        return count($this->items);
    }

    /**
     * returns if an object exists in a specific key
     * @param  mixed $key   the key which references the object
     * @return bool         true if found, false if not
     */
    public function exists($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * clear the items list
     */
    public function clear()
    {
        $this->items = [];
    }
}
