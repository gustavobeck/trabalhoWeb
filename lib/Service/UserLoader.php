<?php

namespace Service;

use Model\User;

/**
 *
 */
class UserLoader {

  private $userStorage;

  /**
   *
   */
  public function __construct(PdoUserStorage $userStorage) {
    $this->userStorage = $userStorage;
  }

  /**
   *
   */
  public function findUserByEmail(string $email) {
    $userArray = $this->userStorage->fetchSingleUserByEmail($email);

    if ($userArray) {
      return $this->createUserFromData($userArray);
    }

    return NULL;
  }

  /**
   *
   */
  public function findUserById(int $id) {
    $userArray = $this->userStorage->fetchSingleUserById($id);

    if ($userArray) {
      return $this->createUserFromData($userArray);
    }

    return NULL;
  }

  /**
   *
   */
  public function createUserFromData(array $userData) {
    $user = new User(
      $userData["id"],
      $userData["name"],
      \DateTime::createFromFormat("Y-m-d", $userData["birthday"]),
      $userData["cpf"],
      $userData["email"],
      $userData["phone"],
      $userData["username"],
      $userData["password"]
    );

    return $user;
  }

}
