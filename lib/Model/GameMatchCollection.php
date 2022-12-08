<?php

namespace Model;

/**
 *
 */
class GameMatchCollection implements \ArrayAccess, \IteratorAggregate {
  private $gameMatch;

  /**
   *
   */
  public function __construct(array $gameMatch) {
    $this->gameMatch = $gameMatch;
  }

  /**
   *
   */
  public function offsetExists($offset) {
    return array_key_exists($offset, $this->gameMatch);
  }

  /**
   *
   */
  public function offsetGet($offset) {
    return $this->gameMatch[$offset];
  }

  /**
   *
   */
  public function offsetSet($offset, $value) {
    $this->gameMatch[$offset] = $value;
  }

  /**
   *
   */
  public function offsetUnset($offset) {
    unset($this->gameMatch[$offset]);
  }

  /**
   *
   */
  public function getIterator(): \Traversable {
    return new \ArrayIterator($this->gameMatch);
  }

}
