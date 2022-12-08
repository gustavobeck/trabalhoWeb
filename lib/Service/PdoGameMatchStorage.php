<?php

namespace Service;

use Model\GameMatch;

/**
 *
 */
class PdoGameMatchStorage {

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
  public function registerGameMatch(GameMatch $gameMatch) {
    try {
      $pdo = $this->pdo;
      $stmt = $pdo->prepare("INSERT INTO game_match (size, mode, time, date, score, id_user) VALUES (:size, :mode, :time, :dateGameMatch, :score, :id_user)");
      $stmt->execute([
        'size' => $gameMatch->getSize(),
        'mode' => $gameMatch->getMode(),
        'time' => $gameMatch->getTime(),
        'dateGameMatch' => $gameMatch->getDate(),
        'score' => $gameMatch->getScore(),
        'id_user' => $gameMatch->getUserId(),
      ]);
      return 1;
    }
    catch (\Exception $e) {
      return $e;
    }

  }

  /**
   *
   */
  public function fetchAllGameMatchesDataByUserId(int $id) {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("SELECT * FROM game_match WHERE id_user = :id");
    $stmt->execute(['id' => $id]);
    $gameMatchesArray = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $gameMatchesArray;
  }

  /**
   *
   */
  public function fetchAllTopGameMatches() {
    $pdo = $this->pdo;
    $stmt = $pdo->prepare("SELECT gm.*, u.username FROM game_match AS gm INNER JOIN user AS u ON u.id = gm.id_user ORDER BY size DESC, score ASC, time DESC LIMIT 10");
    $stmt->execute();
    $gameMatchesArray = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return $gameMatchesArray;
  }

}
