<?php

namespace Service;

use Model\GameMatch;
use Model\GameMatchCollection;

/**
 *
 */
class GameMatchLoader {

  private $gameMatchStorage;

  /**
   *
   */
  public function __construct(PdoGameMatchStorage $gameMatchStorage) {
    $this->gameMatchStorage = $gameMatchStorage;
  }

  /**
   * @return Model\GameMatchCollection[]
   */
  public function getGameMatchesHistory(int $id) {
    try {
      $gameMatchesData = $this->gameMatchStorage->fetchAllGameMatchesDataByUserId($id);
    }
    catch (\Exception $e) {
      $gameMatchesData = [];
    }

    $gamesMatches = [];

    foreach ($gameMatchesData as $gameMatchData) {
      $gamesMatches[] = $this->createGameMatchFromData($gameMatchData);
    }

    return new GameMatchCollection($gamesMatches);
  }

  /**
   * @return Model\GameMatchCollection[]
   */
  public function getGameMatchesRanking() {
    try {
      $gameMatchesData = $this->gameMatchStorage->fetchAllTopGameMatches();
    }
    catch (\Exception $e) {
      $gameMatchesData = [];
    }

    $gamesMatches = [];

    foreach ($gameMatchesData as $gameMatchData) {
      $gamesMatches[] = $this->createGameMatchFromData($gameMatchData);
    }

    return new GameMatchCollection($gamesMatches);
  }

  /**
   *
   */
  public function createGameMatchFromData(array $gameMatchData) {
    $gameMatch = new GameMatch(
      $gameMatchData["id"],
      $gameMatchData["size"],
      $gameMatchData["mode"] == 'classic' ? 'Clássico' : 'Contra o tempo',
      $gameMatchData["time"],
      \DateTime::createFromFormat("Y-m-d", $gameMatchData["date"]),
      $gameMatchData["score"],
      $gameMatchData["id_user"],
    );

    if ($gameMatchData["username"]) {
      $gameMatch->setUsername($gameMatchData["username"]);
    }

    return $gameMatch;
  }

}
