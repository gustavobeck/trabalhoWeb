<?php

namespace Model;

/**
 * Class responsible to create a GameMatch object.
 */
class GameMatch {

  /**
   * The id.
   *
   * @var int
   */
  private $id;

  /**
   * The size of a board.
   *
   * @var int
   */
  private $size;

  /**
   * The mode of the game.
   *
   * @var string
   */
  private $mode;

  /**
   * The time.
   *
   * @var \DateTime
   */
  private $time;

  /**
   * The date.
   *
   * @var \DateTime
   */
  private $date;

  /**
   * The score.
   *
   * @var int
   */
  private $score;

  /**
   * The userId.
   *
   * @var int
   */
  private $userId;

  /**
   * The username.
   *
   * @var string
   */
  private $username;

  /**
   * The constructor.
   *
   * @param int $id
   *   The id.
   * @param int $size
   *   The size.
   * @param string $mode
   *   The mode.
   * @param int $time
   *   The time.
   * @param \DateTime $date
   *   The date.
   * @param int $score
   *   The score.
   * @param int $userId
   *   The userId.
   */
  public function __construct(int $id = NULL, int $size, string $mode, int $time, \DateTime $date, int $score, int $userId) {
    $this->id = $id;
    $this->size = $size;
    $this->mode = $mode;
    $this->time = $time;
    $this->date = $date;
    $this->score = $score;
    $this->userId = $userId;
  }

  /**
   * Get the value of id.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Get the value of size board.
   */
  public function getSize() {
    return $this->size;
  }

  /**
   * Set the value of size.
   *
   * @return int
   *   Return the size of the board.
   */
  public function setSize($size) {
    $this->size = $size;

    return $this;
  }

  /**
   * Get the value of mode.
   */
  public function getMode() {
    return $this->mode;
  }

  /**
   * Set the value of mode.
   *
   * @return string
   *   Return the mode.
   */
  public function setMode($mode) {
    $this->mode = $mode;

    return $this;
  }

  /**
   * Get the value of time.
   */
  public function getTime() {
    return $this->time;
  }

  /**
   * Set the value of time.
   *
   * @return int
   *   Return the time.
   */
  public function setTime($time) {
    $this->time = $time;

    return $this;
  }

  /**
   * Get the value of date.
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * Set the value of date.
   *
   * @return \DateTime
   *   Return the date.
   */
  public function setDate($date) {
    $this->date = $date;

    return $this;
  }

  /**
   * Get the value of score.
   */
  public function getScore() {
    return $this->score;
  }

  /**
   * Set the value of score.
   *
   * @return int
   *   Return the score.
   */
  public function setScore($score) {
    $this->score = $score;

    return $this;
  }

  /**
   * Get the value of userId.
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * Set the value of userId.
   *
   * @return int
   *   Return the userId.
   */
  public function setUserId($userId) {
    $this->userId = $userId;

    return $this;
  }

  /**
   * Get the username.
   *
   * @return string
   *   Return the username.
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * Set the username.
   *
   * @param string $username
   *   The username.
   *
   * @return self
   *   The username.
   */
  public function setUsername(string $username) {
    $this->username = $username;

    return $this;
  }

}
