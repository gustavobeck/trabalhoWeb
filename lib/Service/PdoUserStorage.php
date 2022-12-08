<?php

namespace Service;

use Model\User;

/**
 *
 */
class PdoUserStorage {

  private $pdo;

  /**
   *
   */
  public function __construct(\PDO $pdo) {
    $this->pdo = $pdo;
  }

  /**
   *
   */
  public function insertUser(User $user) {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("INSERT INTO user (name, birthday, cpf, email, phone, username, password) VALUES (:name, :birthday, :cpf, :email, :phone, :username, :password)");
    $stmt->execute([
      'name' => $user->getName(),
      'birthday' => $user->getBirthday(),
      'cpf' => $user->getCpf(),
      'email' => $user->getEmail(),
      'phone' => $user->getPhone(),
      'username' => $user->getUsername(),
      'password' => $user->getPassword(),
    ]);
  }

  /**
   *
   */
  public function updateUser(User $user) {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("UPDATE user SET name = :name, email = :email, phone = :phone, password = :password WHERE id = :id");
    $stmt->execute([
      'name' => $user->getName(),
      'email' => $user->getEmail(),
      'phone' => $user->getPhone(),
      'password' => $user->getPassword(),
      'id' => $user->getId(),
    ]);
  }

  /**
   *
   */
  public function fetchSingleUserByEmail(string $email) {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$user) {
      return NULL;
    }

    return $user;
  }

  /**
   *
   */
  public function fetchSingleUserById(int $id) {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$user) {
      return NULL;
    }

    return $user;
  }

}
