<?php
class RankingTable {
    private $players = [];

    public function __construct($playerNames) {
        foreach ($playerNames as $playerName) {
            $this->players[$playerName] = ['score' => 0, 'gamesPlayed' => 0];
        }
    }

    public function recordResult($playerName, $score) {
        if (isset($this->players[$playerName])) {
            $this->players[$playerName]['score'] += $score;
            $this->players[$playerName]['gamesPlayed']++;
        }
    }

    public function playerRank($rank) {
        $sortedPlayers = $this->players;
        arsort($sortedPlayers);

        $prevScore = PHP_INT_MAX;
        $prevGamesPlayed = PHP_INT_MAX;
        $currentRank = 0;

        foreach ($sortedPlayers as $playerName => $playerData) {
            $score = $playerData['score'];
            $gamesPlayed = $playerData['gamesPlayed'];

            if ($score < $prevScore || $gamesPlayed < $prevGamesPlayed) {
                $currentRank++;
            }

            if ($currentRank === $rank) {
                return $playerName;
            }

            $prevScore = $score;
            $prevGamesPlayed = $gamesPlayed;
        }

        return null;
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1); // Wyświetli: Monika
