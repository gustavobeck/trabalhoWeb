<?php

namespace Service;

use Model\GameMatch;
use Model\User;

/**
 *
 */
class Container {

  private $configuration;

  private $pdo;

  private $userLoader;

  private $userStorage;

  private $gameMatchStorage;

  /**
   *
   */
  public function __construct(array $configuration) {
    $this->configuration = $configuration;
  }

  /**
   *
   */
  public function getPDO() {

    if ($this->pdo === NULL) {
      $this->pdo = new \PDO(
            $this->configuration['db_dsn'],
            $this->configuration['db_user'],
            $this->configuration['db_pass']
        );
    }
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $this->pdo;
  }

  /**
   *
   */
  public function getUserLoader() {
    if ($this->userLoader === NULL) {
      $this->userLoader = new UserLoader($this->getUserStorage());
    }

    return $this->userLoader;
  }

  /**
   *
   */
  public function getUserStorage() {
    if ($this->userStorage === NULL) {
      $this->userStorage = new PdoUserStorage($this->getPDO());
    }

    return $this->userStorage;
  }

  /**
   *
   */
  public function setUser(User $user) {
    if ($this->userStorage === NULL) {
      $this->userStorage = new PdoUserStorage($this->getPDO());
    }

    $user->setBirthday($user->getBirthday()->format('Y-m-d'));

    return $this->userStorage->insertUser($user);
  }

  /**
   *
   */
  public function updateUser(User $user) {
    if ($this->userStorage === NULL) {
      $this->userStorage = new PdoUserStorage($this->getPDO());
    }

    return $this->userStorage->updateUser($user);
  }

  /**
   *
   */
  public function getGameMatchLoader() {
    if ($this->gameMatchLoader === NULL) {
      $this->gameMatchLoader = new GameMatchLoader($this->getGameMatchStorage());
    }

    return $this->gameMatchLoader;
  }

  /**
   *
   */
  public function getGameMatchStorage() {
    if ($this->gameMatchStorage === NULL) {
      $this->gameMatchStorage = new PdoGameMatchStorage($this->getPDO());
    }

    return $this->gameMatchStorage;
  }

  /**
   *
   */
  public function setGameMatch(GameMatch $gameMatch) {
    if ($this->gameMatchStorage === NULL) {
      $this->gameMatchStorage = new PdoGameMatchStorage($this->getPDO());
    }

    $gameMatch->setDate($gameMatch->getDate()->format('y-m-d'));

    return $this->gameMatchStorage->registerGameMatch($gameMatch);
  }

}
